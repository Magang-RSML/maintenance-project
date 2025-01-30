<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // Constructor untuk middleware role
    public function index()
    {
        $devices = Device::all(); 
        $role = str_replace('-', '_', request()->segment(1));
        return view("$role.devices.index", compact('devices')); // View sesuai role
    }

    // Menampilkan form untuk membuat device baru
    public function create()
    {
        $role = str_replace('-', '_', request()->segment(1));
        $rooms = Room::all();
        return view("$role.devices.create", compact('rooms'));
    }

    // Menyimpan device baru
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
        return redirect()->route(request()->segment(1) . '.devices.index')->with('success', 'Perangkat berhasil ditambahkan.');    
    }

    // Menampilkan form untuk mengedit device
    public function edit(Device $device)
    {
        $role = str_replace('-', '_', request()->segment(1));
        $rooms = Room::all();
        return view("$role.devices.edit", compact('device', 'rooms'));
    }

    // Memperbarui device yang sudah ada
    public function update(Request $request, Device $device)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255|unique:devices,brand,' . $device->id,
            'room_id' => 'required|exists:rooms,id',
            // 'status' => 'required|in:active,inactive,maintenance,reporting',
        ]);
    
        // Update hanya dengan data yang valid
        $device->update([
            'name' => $request->name,
            'type' => $request->type,
            'brand' => $request->brand,
            'room_id' => $request->room_id,
            // 'status' => $request->status,
        ]);
    
        return redirect()->route(request()->segment(1) . '.devices.index')->with('success', 'Perangkat berhasil diperbarui.');
    }
    
  
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route(request()->segment(1) . '.devices.index')
        ->with('success', 'Perangkat berhasil dihapus.');
    }
}
