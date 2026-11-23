<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function index()
    {
        return view('guest.auth');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session(['last_login' => now()->format('Y-m-d H:i:s')]);

            if (Auth::user()->role == 'Admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('guest.home');
        }

        return back()
            ->with('error', 'Email atau Password salah!')
            ->onlyInput('email');
    }

    public function forgotPassword()
    {
        return view('guest.forgot-password');
    }

   public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = User::where('email', $request->email)->first();

    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('auth.index')
        ->with('success', 'Password berhasil diubah. Silakan login.');
}

        public function logout()
        {
            Auth::logout();

            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect('/');
        }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Pelanggan',
        ]);

        return redirect()->route('auth.index')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
