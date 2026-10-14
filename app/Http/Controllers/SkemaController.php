<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $skemas = Skema::when($search, function ($query, $search) {
            return $query->where('kode_skema', 'like', "%{$search}%")
                ->orWhere('nama_skema', 'like', "%{$search}%");
        })->paginate(10); // Atau gunakan ->get() jika tidak pakai pagination

        return view('skemas.index', compact('skemas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skemas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema',
            'nama_skema' => 'required',
            'jenis' => 'required',
        ], [
            'kode_skema.required' => 'Kode skema wajib diisi.',
            'kode_skema.unique' => 'Kode skema sudah terdaftar.',
            'nama_skema.required' => 'Nama skema wajib diisi.',
        ]);

        Skema::create($request->all());

        return redirect()->route('skemas.index')->with('success', 'Data skema berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skema = Skema::findOrFail($id);
        return view('skemas.show', compact('skema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skema $skema)
    {
        return view('skemas.edit', compact('skema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required',
            'jenis' => 'required',
        ]);

        $skema->update($request->all());
        return redirect()->route('skemas.index')->with('success', 'Data skema berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skema $skema)
    {
        $skema->delete();
        return redirect()->route('skemas.index')->with('success', 'Data skema berhasil dihapus.');
    }
}
