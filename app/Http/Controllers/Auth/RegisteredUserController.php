<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Peserta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input tanpa aturan 'exists:pesertas,email' agar bisa register mandiri
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat akun user baru dengan role 'peserta'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'peserta',
        ]);

        // Otomatis buatkan data kosong di tabel pesertas
        // agar terhubung dengan email user dan bisa dilengkapi biodatanya nanti
        Peserta::create([
            'nama_lengkap' => $request->name,
            'email' => $request->email,
            'nik' => null,
            'no_hp' => null,
        ]);

        // Pastikan tidak ada sesi yang tertinggal (paksa logout dari sistem auto-login breeze)
        if (Auth::check()) {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan ke halaman login dengan pesan sukses
        return to_route('login')->with('status', 'Registrasi berhasil! Silakan login dan lengkapi biodata Anda.');
    }
}
