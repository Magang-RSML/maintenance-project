<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'floor' => 'required|integer|min:1',
            'building' => 'required|string|max:255',
        ]);

        Room::create($validated);
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'floor' => 'required|integer|min:1',
            'building' => 'required|string|max:255',
        ]);

        $room = Room::findOrFail($id);
        $room->update($validated);
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil dihapus!');
    }
}
