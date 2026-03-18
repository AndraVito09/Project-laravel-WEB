<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function show() {
    return view('formRegister');
}

public function register(Request $request) {
    // Validasi Input
    $request->validate([
        'username'     => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Buat User Baru
    User::create([
        'username'     => $request->username,
        'password' => bcrypt($request->password),
    ]);

    return redirect('/login')->with('status', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
}
}
