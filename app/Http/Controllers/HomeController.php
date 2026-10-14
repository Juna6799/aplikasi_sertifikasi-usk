<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        // Jika yang login adalah peserta
        if ($user->role === 'peserta') {
            // Cari data peserta berdasarkan email
            $pesertaSaya = Peserta::where('email', $user->email)->first();

            // Jika peserta terdaftar tapi belum punya data di tabel pesertas, buatkan otomatis
            if (!$pesertaSaya) {
                $pesertaSaya = Peserta::create([
                    'nama_lengkap' => $user->name,
                    'email' => $user->email,
                    'nik' => null,
                    'no_hp' => null,
                ]);
            }

            $skemas = Skema::all();
            return view('home', compact('pesertaSaya', 'skemas'));
        }

        // Jika Admin
        $totalSkema = Skema::count();
        $totalPeserta = Peserta::count();
        $pesertaTerbaru = Peserta::latest()->take(5)->get();

        return view('home', compact('totalSkema', 'totalPeserta', 'pesertaTerbaru'));
    }
}
