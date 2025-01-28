<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    // Constructor untuk middleware role
    public function __construct()
    {
        // Admin bisa mengakses semua fitur
        // IT Staff dan Employee dibatasi aksesnya
        $this->middleware('role:admin')->except(['index', 'show', 'store', 'edit', 'update']);
        $this->middleware('role:it_staff,employee')->only(['index', 'show', 'store', 'edit', 'update']);
    }
    
    // Menampilkan daftar devices
    public function index()
    {
        // Memeriksa level pengguna yang disimpan dalam session
        $userLevel = session('user_level');
        
        // Admin bisa melihat semua devices
        if ($userLevel === 'admin') {
            $devices = Device::all();
        } else {
            // IT Staff dan Employee hanya bisa melihat devices terkait mereka
            $devices = Device::where('user_id', Auth::id())->get(); // Gantilah sesuai dengan relasi pengguna
        }
        return view('devices.index', compact('devices'));
    }

    // Menampilkan form untuk membuat device baru
    public function create()
    {
        $rooms = Room::all();
        return view('devices.create', compact('rooms'));
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
        return redirect()->route('devices.index')->with('success', 'Device berhasil ditambahkan.');
    }

    // Menampilkan detail device
    public function show($id)
    {
        $device = Device::findOrFail($id);
        return view('devices.show', compact('device'));
    }

    // Menampilkan form untuk mengedit device
    public function edit(Device $device)
    {
        $rooms = Room::all();
        return view('devices.edit', compact('device', 'rooms'));
    }

    // Memperbarui device yang sudah ada
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
