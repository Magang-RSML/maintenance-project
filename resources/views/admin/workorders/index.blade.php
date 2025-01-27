@extends('layouts.app')

@section('content')
<!-- <div class="container my-4"> -->
    <h1 class="text-center text-white mb-4">Database Laporan<br>Service & Maintenance Perangkat</h1><hr>
    <a href="{{ route('workorders.create') }}" class="btn btn-success mb-3">Tambahkan Laporan</a>
    <div class="table-responsive bg-dark rounded shadow p-3">
        <table class="table table-dark table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Perangkat</th>
                    <th>Ruang</th>
                    <th>Tanggal Laporan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workOrders as $workOrder)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $workOrder->user->name ?? '-' }}</td>
                    <td>{{ $workOrder->device->name ?? '-' }}</td>
                    <td>{{ $workOrder->room->name ?? '-' }}</td>
                    <td>{{ $workOrder->requested_date }}</td>
                    <td>
                        <!-- {{ ucfirst($workOrder->status) }} -->
                        @if ($workOrder->status === 'unread')
                            <span class="badge bg-danger">Belum dikerjakan</span>
                        @elseif ($workOrder->status === 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif ($workOrder->status === 'in_progress')
                            <span class="badge bg-info">Proses Perbaikan</span>
                        @else
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                    <td>
                        <p>
                            Keterangan Masalah: {{ $workOrder->issue_description }}
                            <br>
                            Catatan Perbaikan: {{ $workOrder->notes ?: '-' }}
                        </P>
                    </td>
                    <td>
                        <a href="{{ route('workorders.edit', $workOrder) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('workorders.destroy', $workOrder) }}" method="POST" class="d-inline">
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
