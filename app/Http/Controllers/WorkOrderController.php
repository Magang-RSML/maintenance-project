<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\User;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index()
    {
        $workOrders = WorkOrder::with(['user', 'device.room'])->get();
        return view('workorders.index', compact('workOrders'));
    }

    public function create()
    {
        $devices = Device::all();
        $users = User::all();

        return view('workorders.create', compact('devices', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'device_id' => 'required|exists:devices,id',
            'requested_date' => 'required|date',
            'issue_description' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed,unread',
        ]);

        $device = Device::find($request->device_id);

        WorkOrder::create([
            'user_id' => $request->user_id,
            'device_id' => $device->id,
            'room_id' => $device->room_id,
            'requested_date' => $request->requested_date,
            'status' => 'unread', // Default status
            'issue_description' => $request->issue_description,
            'notes' => $request->notes,
        ]);

        return redirect()->route('workorders.index')->with('success', 'Work order berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $workOrder = WorkOrder::findOrFail($id);
        $users = User::all();
        $devices = Device::all();

        return view('workorders.edit', compact('workOrder', 'users', 'devices'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'device_id' => 'required|exists:devices,id',
            'requested_date' => 'required|date',
            'issue_description' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $device = Device::find($request->device_id);

        $workOrder = WorkOrder::findOrFail($id);

        $workOrder->update([
            'user_id' => $request->user_id,
            'device_id' => $device->id,
            'room_id' => $device->room_id,
            'requested_date' => $request->requested_date,
            'status' => $request->status,
            'issue_description' => $request->issue_description,
            'notes' => $request->notes,
        ]);

        return redirect()->route('workorders.index')->with('success', 'Work order berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $workOrder = WorkOrder::findOrFail($id);
        $workOrder->delete();
        return redirect()->route('workorders.index')->with('success', 'Work order berhasil dihapus.');
    }
}
