<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('guest.auth');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($request->username == $request->password) {
            return redirect()->route('admin.dashboard');
        }

        // Jika username atau password salah
        return redirect()->back()->with('error', 'Username atau Password salah!');
    }
}
