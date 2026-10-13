<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // Hanya admin yang diizinkan mengakses fungsi-fungsi modifikasi data
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $user = $request->user();

            if(!$user || !$user->isAdmin()){
                if(in_array($request->route()->getActionMethod(), ['create', 'store', 'edit', 'update', 'destroy']))
                {
                    abort(403, 'Unauthorized action.');
                }
            }
            return $next($request);
        });
    }

    // Menampilkan daftar peserta
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pesertas = Peserta::when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('nik', 'like', "%{$search}%");
        })->paginate(10);

        return view('pesertas.index', compact('pesertas', 'search'));
    }

    // Menampilkan form tambah peserta
    public function create()
    {
        $skemas = Skema::all(); // Ambil semua data skema untuk dropdown
        return view('pesertas.create', compact('skemas'));
    }

    // Menyimpan data peserta baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik'          => 'required|numeric|digits:16|unique:pesertas,nik',
            'skema_id'     => 'required|exists:skemas,id',
            'email'        => 'required|email|max:255',
            'no_hp'      => 'required|numeric|digits:12',
        ]);

        Peserta::create($request->all());

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    // Menampilkan form edit peserta
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas = Skema::all(); // Ambil data skema juga untuk form edit
        return view('pesertas.edit', compact('peserta', 'skemas'));
    }

    // Mengupdate data peserta di database
    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255', // Diubah dari 'nama' ke 'nama_lengkap'
            'nik'          => 'required|numeric|digits:16|unique:pesertas,nik,' . $peserta->id,
            'skema_id'     => 'required|exists:skemas,id', // Ditambahkan validasi skema_id
            'email'        => 'required|email|max:255',
            'no_hp'      => 'required|numeric|digits:12',
        ]);

        $peserta->update($request->all());

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil diupdate.');
    }

    // Menghapus data peserta
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil dihapus.');
    }
}
