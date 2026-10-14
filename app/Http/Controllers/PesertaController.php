<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $user = $request->user();

            if(!$user || !$user->isAdmin()){
                if(in_array($request->route()->getActionMethod(), ['create', 'store', 'destroy']))
                {
                    abort(403, 'Unauthorized action.');
                }
            }
            return $next($request);
        });
    }

    // Menampilkan daftar peserta. Admin melihat semua data, Peserta hanya melihat data miliknya sendiri.
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user = $request->user();

        $query = Peserta::query();

        // Jika user adalah peserta, filter data berdasarkan email akun yang login
        if ($user && !$user->isAdmin()) {
            $query->where('email', $user->email);
        }

        // Fitur pencarian (search)
        $query->when($search, function ($q, $search) {
            return $q->where('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('nik', 'like', "%{$search}%");
        });

        $pesertas = $query->paginate(10);

        return view('pesertas.index', compact('pesertas', 'search'));
    }

    // Menampilkan form tambah peserta (Hanya Admin).
    public function create()
    {
        $skemas = Skema::all();
        return view('pesertas.create', compact('skemas'));
    }

    // Menyimpan data peserta baru ke database (Hanya Admin).
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'nik'          => 'required|numeric|digits:16|unique:pesertas,nik',
            'skema_id'     => 'required|exists:skemas,id',
            'email'        => 'required|email|max:255',
            'no_hp'        => 'required|numeric|digits_between:10,12',
        ], [
            'nama_lengkap.regex' => 'Nama lengkap hanya boleh berisi huruf dan spasi, tidak boleh mengandung angka.',
            'no_hp.digits_between' => 'Nomor HP/WhatsApp harus di antara 10 hingga 12 digit.',
        ]);

        Peserta::create($request->all());

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail data peserta (Show).
     */
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        $user = request()->user();

        // Jika bukan admin dan email peserta tidak cocok, tolak akses (403)
        if (!$user->isAdmin() && $peserta->email !== $user->email) {
            abort(403, 'Unauthorized action.');
        }

        return view('pesertas.show', compact('peserta'));
    }

    // Menampilkan form edit peserta. Dilindungi agar peserta hanya bisa mengedit data miliknya sendiri.
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $user = request()->user();

        // Jika bukan admin dan email peserta tidak cocok, tolak akses (403)
        if (!$user->isAdmin() && $peserta->email !== $user->email) {
            abort(403, 'Unauthorized action.');
        }

        $skemas = Skema::all();
        return view('pesertas.edit', compact('peserta', 'skemas'));
    }

    // Mengupdate data peserta di database. Dilindungi dengan pengecekan keamanan yang sama seperti edit.
    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $user = request()->user();

        // Jika bukan admin dan email peserta tidak cocok, tolak akses (403)
        if (!$user->isAdmin() && $peserta->email !== $user->email) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'nik'          => 'required|numeric|digits:16|unique:pesertas,nik,' . $peserta->id,
            'skema_id'     => 'required|exists:skemas,id',
            'email'        => 'required|email|max:255',
            'no_hp'        => 'required|numeric|digits_between:10,12',
        ], [
            'nama_lengkap.regex' => 'Nama lengkap hanya boleh berisi huruf dan spasi, tidak boleh mengandung angka.',
            'no_hp.digits_between' => 'Nomor HP/WhatsApp harus di antara 10 hingga 12 digit.',
        ]);

        $peserta->update($request->all());

        // Mengarahkan kembali ke halaman home/dashboard setelah update biodata
        return redirect()->route('home')->with('success', 'Biodata berhasil diupdate.');
    }

    // Membatalkan status verifikasi peserta (kembali ke Pending)
    public function batalVerifikasi($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update([
            'status' => 'Pending'
        ]);

        return redirect()->route('pesertas.index')->with('success', 'Status verifikasi peserta dibatalkan (Pending).');
    }

    public function verifikasi($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update([
            'status' => 'Terverifikasi'
        ]);

        return redirect()->route('pesertas.index')->with('success', 'Status peserta berhasil diverifikasi.');
    }
    // Menghapus data peserta (Hanya Admin).
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil dihapus.');
    }
}
