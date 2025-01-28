<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Menampilkan daftar ruang (untuk admin saja).
    public function index()
    {
        $rooms = Room::all(); // Ambil semua data ruang
        return view('admin.rooms.index', compact('rooms'));
    }

    // Menampilkan form untuk membuat ruang baru (untuk admin saja).
    public function create()
    {
        return view('admin.rooms.create');
    }

    // Menyimpan data ruang baru (untuk admin saja).
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'floor' => 'required|integer|min:1',
            'building' => 'required|string|max:255',
        ]);

        Room::create($validated);
        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit ruang (untuk admin saja).
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    // Memperbarui data ruang (untuk admin saja).
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'floor' => 'required|integer|min:1',
            'building' => 'required|string|max:255',
        ]);

        $room = Room::findOrFail($id);
        $room->update($validated);
        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil diperbarui!');
    }

    // Menghapus ruang (untuk admin saja).
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Ruang berhasil dihapus.');
    }
}
