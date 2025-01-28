<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar pengguna (untuk admin saja).
    public function index()
    {
        $users = User::all();// Ambil semua data pengguna
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru (untuk admin saja).
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'level' => 'required|in:admin,it_staff,employee',
        ]);

        User::create($validated);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit pengguna (untuk admin saja).
    public function edit($id)
    {
        $user = User::findOrFail($id); // Cari pengguna berdasarkan ID
        return view('admin.users.edit', compact('user'));
    }

    // Memperbarui data pengguna (untuk admin saja).
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Cari pengguna berdasarkan ID

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $id,
            'level' => 'required|in:admin,it_staff,employee',
        ]);

        $user->update($validated);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
    }

    // Menghapus data pengguna (untuk admin saja).
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Cari pengguna berdasarkan ID
        $user->delete(); // Hapus pengguna

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
