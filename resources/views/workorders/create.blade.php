@extends('layouts.app')

@section('content')
<!-- <div class="container my-4"> -->
    <h1 class="text-center text-white mb-4">Tambah Laporan<br>Service & Maintenance Perangkat</h1><hr>
    <div class="card bg-dark text-white shadow rounded">
        <div class="card-body">
            <form action="{{ route('workorders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="" disabled selected>Nama Pelapor</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="device_id">Device</label>
                    <select class="form-control" id="device_id" name="device_id" required>
                        <option value="" disabled selected>Select Device</option>
                        @foreach ($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->name }} - {{ $device->room->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="requested_date">Tanggal Laporan</label>
                    <input type="date" class="form-control" id="requested_date" name="requested_date" required>
                </div>
                <div class="form-group">
                    <label for="issue_description">Deskripsi Masalah</label>
                    <textarea class="form-control" id="issue_description" name="issue_description"></textarea>
                </div>
                <div class="form-group">
                    <label for="notes">Catatan Perbaikan</label>
                    <textarea class="form-control" id="notes" name="notes"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="unread">Buat Laporan</option>
                        <!-- <option value="pending">Pending</option> -->
                        <!-- <option value="in_progress">In Progress</option> -->
                        <!-- <option value="completed">Completed</option> -->
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
                <a href="{{ route('workorders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
