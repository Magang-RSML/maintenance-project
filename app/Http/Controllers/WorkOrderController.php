<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\User;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    // Tampilkan daftar perangkat.
    public function index()
    {
        $workOrders = WorkOrder::all(); 
        $role = str_replace('-', '_', request()->segment(1));
        $workOrders = WorkOrder::with(['user', 'device.room'])->get();
        return view("$role.workorders.index", compact('workOrders'));
    }

    // Menampilkan form untuk membuat device baru
    public function create()
    {
        $devices = Device::all();
        $rooms = Room::all();
        $users = User::all();
        $role = str_replace('-', '_', request()->segment(1));
        return view("$role.workorders.create", compact('devices', 'rooms', 'users'));
    }

    // Menyimpan device baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'device_id' => 'required|exists:devices,id',
            'requested_date' => 'required|date',
            // 'updated_at' => 'required|date',
            'issue_description' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed,unread',
        ]);

        $device = Device::find($request->device_id);

        WorkOrder::create([
            'user_id' => $request->user_id,
            'device_id' => $device->id,
            'room_id' => $device->room_id ?? null,
            'requested_date' => $request->requested_date,
            'status' => 'unread', // Default status
            'issue_description' => $request->issue_description,
            'notes' => $request->notes,
        ]);
          
        return redirect()->route(request()->segment(1) . '.workorders.index')->with('success', 'Work order berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit device
    public function edit($id)
    {
        $role = str_replace('-', '_', request()->segment(1));
        $workOrder = WorkOrder::findOrFail($id);
        $users = User::all();
        $devices = Device::all();
        return view("$role.workorders.edit", compact('workOrder', 'users', 'devices'));
    }

    // Memperbarui device yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'device_id' => 'required|exists:devices,id',
            'requested_date' => 'required|date',
            // 'updated_at' => 'required|date',
            'issue_description' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed,unread',
        ]);

        $device = Device::find($request->device_id);

        $workOrder = WorkOrder::findOrFail($id);

        $workOrder->update([
            'user_id' => $request->user_id,
            'device_id' => $device->id,
            'room_id' => $device->room_id,
            'requested_date' => $request->requested_date,
            'update_at' => $request->update_at,
            'status' => 'unread', // Default status
            'issue_description' => $request->issue_description,
            'notes' => $request->notes,
        ]);

        $workOrder->update($request->all());
        return redirect()->route(request()->segment(1) . '.workorders.index')->with('success', 'Work order berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $workOrder = WorkOrder::findOrFail($id);
        $workOrder->delete();
        return redirect()->route(request()->segment(1) . '.workorders.index')->with('success', 'Work order berhasil dihapus.');
    }
}
