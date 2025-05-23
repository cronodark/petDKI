<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function authentication(Request $request)
    {
        // validate the form data
        $request->validate([
            'identifier' => 'required', //email atau username
            'password' => 'required'
        ]);

        // attempt to log the user in
        // Menentukan apakah menggunakan email atau username
        $identifier = $request->identifier;
        $password = $request->password;

        // Cek apakah identifier adalah email atau username
        $user = filter_var($identifier, FILTER_VALIDATE_EMAIL)
            ? User::where('email', $identifier)->first()
            : User::where('username', $identifier)->first();

        if ($user && Auth::attempt(['email' => $user->email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', "Login Berhasil!"); // redirect ke halaman dashboard
        }
        return back()->with('error', 'Login gagal, silahkan coba lagi');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil');
    }
}
