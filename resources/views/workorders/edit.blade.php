@extends('layouts.app')

@section('content')
<!-- <div class="container my-4"> -->
    <h1 class="text-center text-white mb-4">Edit Laporan<br>Service & Maintenance Perangkat</h1><hr>
    <div class="card bg-dark text-white shadow rounded">
        <div class="card-body">
            <form action="{{ route('workorders.update', ['workorder' => $workOrder->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="user_id">Nama Pelapor</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $workOrder->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="device_id">Device</label>
                    <select class="form-control" id="device_id" name="device_id" required>
                        @foreach ($devices as $device)
                        <option value="{{ $device->id }}" {{ $workOrder->device_id == $device->id ? 'selected' : '' }}>
                            {{ $device->name }} - {{ $device->room->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="requested_date">Tanggal Laporan</label>
                    <input type="date" class="form-control" id="requested_date" name="requested_date" value="{{ $workOrder->requested_date }}" required>
                </div>
                <div class="form-group">
                    <label for="issue_description">Deskripsi Masalah</label>
                    <textarea class="form-control" id="issue_description" name="issue_description">{{ $workOrder->issue_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="notes">Catatan Perbaikan</label>
                    <textarea class="form-control" id="notes" name="notes">{{ $workOrder->notes }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="unread" {{ $workOrder->status == 'unread' ? 'selected' : '' }}>Belum Dikerjakan</option>
                        <option value="pending" {{ $workOrder->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $workOrder->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $workOrder->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                <a href="{{ route('devices.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
