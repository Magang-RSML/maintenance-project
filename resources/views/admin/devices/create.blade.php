@extends('layouts.app')

@section('content')
<!-- <div class="container my-4"> -->
    <h1 class="text-center text-white mb-4">Tambah Perangkat Baru</h1><hr>
    <div class="card bg-dark text-white shadow rounded">
        <div class="card-body">
            <form action="{{ route('devices.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Device Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" required>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" required>
                </div>
                <div class="form-group">
                    <label for="room_id">Room</label>
                    <select class="form-control" id="room_id" name="room_id" required>
                        <option value="" disabled selected>Select Room</option>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active">Active</option>
                        <!-- <option value="inactive">Inactive</option> -->
                        <!-- <option value="maintenance">Maintenance</option> -->
                        <!-- <option value="reporting">Pengajuan Laporan</option> -->
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
                <a href="{{ route('devices.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
