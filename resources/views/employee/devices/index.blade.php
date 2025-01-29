@extends('employee.layouts.app')

@section('content')
<!-- <div class="container my-4"> -->
    <h1 class="text-center text-white mb-4">Database Perangkat</h1><hr>
    <a href="{{ route (request()->segment(1) . '.devices.create') }}" class="btn btn-success mb-3">Tambah Perangkat Baru</a>
    <div class="table-responsive bg-dark rounded shadow p-3">
        <table class="table table-dark table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Perangkat</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Ruang</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $device)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $device->name }}</td>
                    <td>{{ $device->type }}</td>
                    <td>{{ $device->brand }}</td>
                    <td>{{ $device->room->name ?? '-' }}</td>
                    <td>
                        <!-- {{ ucfirst($device->status) }} -->
                        @if ($device->status === 'inactive')
                            <span class="badge bg-danger">Rusak</span>
                        @elseif ($device->status === 'reporting')
                            <span class="badge bg-warning">Proses Lapor Perbaikan</span>
                        @elseif ($device->status === 'maintenance')
                            <span class="badge bg-info">Perbaikan</span>
                        @else
                            <span class="badge bg-success">Normal</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route (request()->segment(1) . '.devices.edit', $device->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route (request()->segment(1) . '.devices.destroy', $device->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

