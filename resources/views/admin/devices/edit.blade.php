@extends('layouts.app')

@section('content')
<!-- <div class="container my-4"> -->
    <h1 class="text-center text-white mb-4">Edit Perangkat</h1><hr>
    <div class="card bg-dark text-white shadow rounded">
        <div class="card-body">
            <form action="{{ route('devices.update', $device) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Device Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $device->name }}" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $device->type }}" required>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{ $device->brand }}" required>
                </div>
                <div class="form-group">
                    <label for="room_id">Room</label>
                    <select class="form-control" id="room_id" name="room_id" required>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ $device->room_id == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active" {{ $device->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $device->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="maintenance" {{ $device->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        <option value="reporting" {{ $device->status == 'reporting' ? 'selected' : '' }}>Pengajuan Laporan</option>
                    </select>
                </div> -->
                <br>
                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                <a href="{{ route('devices.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
