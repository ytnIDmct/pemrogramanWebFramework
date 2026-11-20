<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Cari user berdasarkan kolom user_nm
        $user = User::where('user_nm', $request->input('username'))->first();

        // Verifikasi pass_wd menggunakan Hash::check
        if (! $user || ! Hash::check($request->input('password'), $user->pass_wd)) {
            return back()->withErrors([
                'login' => 'Username atau password tidak sesuai.',
            ])->withInput($request->only('username'));
        }

        // Login user ke session Laravel
        Auth::login($user);
        $request->session()->regenerate();

        // Update kolom time_log dengan waktu login terkini
        $user->update([
            'time_log' => now(),
        ]);

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}