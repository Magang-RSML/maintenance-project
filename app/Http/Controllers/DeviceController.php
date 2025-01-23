<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::with('room')->get();
        return view('devices.index', compact('devices'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('devices.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255|unique:devices,brand',
            'room_id' => 'required|exists:rooms,id',
            'status' => 'required|in:active,inactive,maintenance,reporting',
        ]);

        Device::create($request->all());

        return redirect()->route('devices.index')->with('success', 'Device berhasil ditambahkan.');
    }

    public function edit(Device $device)
    {
        $rooms = Room::all();
        return view('devices.edit', compact('device', 'rooms'));
    }

    public function update(Request $request, Device $device)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255|unique:devices,brand,' . $device->id,
            'room_id' => 'required|exists:rooms,id',
            'status' => 'required|in:active,inactive,maintenance,reporting',
        ]);

        $device->update($request->all());

        return redirect()->route('devices.index')->with('success', 'Device berhasil diperbarui.');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('devices.index')->with('success', 'Device berhasil dihapus.');
    }
}
