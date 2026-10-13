<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use App\Models\Peserta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalSkema = Skema::count();
        $totalPeserta = Peserta::count();

        $pesertaTerbaru = Peserta::latest()->take(5)->get();
        return view('home', compact('totalSkema', 'totalPeserta', 'pesertaTerbaru'));
    }
}
