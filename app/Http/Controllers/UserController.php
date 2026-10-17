<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Menampilkan semua data user
    public function index()
    {
        $dataUser = User::all();

        return view('admin.user.index', compact('dataUser'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('admin.user.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama user wajib diisi.',
            'name.max' => 'Nama maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()
            ->route('user.index')
            ->with('success', 'Data user berhasil ditambahkan.');
    }

    // Menampilkan form edit user
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    // Memperbarui data user
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama user wajib diisi.',
            'name.max' => 'Nama maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('user.index')
            ->with('success', 'Data user berhasil diperbarui.');
    }

    // Menghapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'Data user berhasil dihapus.');
    }
}
