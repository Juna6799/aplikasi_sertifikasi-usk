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

        if ($user->role === 'peserta') {
            $pesertaSaya = Peserta::where('email', $user->email)->first();

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

        $totalSkema = Skema::count();
        $totalPeserta = Peserta::count();
        $pesertaTerbaru = Peserta::latest()->take(5)->get();

        return view('home', compact('totalSkema', 'totalPeserta', 'pesertaTerbaru'));
    }
}
