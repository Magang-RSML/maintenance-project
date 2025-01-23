<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index()
    {
        $workOrders = WorkOrder::with('device', 'room')->get();
        return view('workorders.index', compact('workOrders'));
    }

    public function create()
    {
        $devices = Device::all();
        $rooms = Room::all();
        return view('workorders.create', compact('devices', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'device_id' => 'required',
            'date' => 'required|date',
            'purpose' => 'required',
            'note' => 'nullable',
        ]);

        WorkOrder::create($request->all());
        return redirect()->route('workorders.index')->with('success', 'Work order created successfully.');
    }

    public function edit(WorkOrder $workOrder)
    {
        $devices = Device::all();
        $rooms = Room::all();
        return view('workorders.edit', compact('workOrder', 'devices', 'rooms'));
    }

    public function update(Request $request, WorkOrder $workOrder)
    {
        $request->validate([
            'room_id' => 'required',
            'device_id' => 'required',
            'date' => 'required|date',
            'purpose' => 'required',
            'note' => 'nullable',
        ]);

        $workOrder->update($request->all());
        return redirect()->route('workorders.index')->with('success', 'Work order updated successfully.');
    }

    public function destroy(WorkOrder $workOrder)
    {
        $workOrder->delete();
        return redirect()->route('workorders.index')->with('success', 'Work order deleted successfully.');
    }
}
