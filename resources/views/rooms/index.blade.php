@extends('layouts.app')

@section('title', 'Room Management')

@section('content')
<div class="container">
    <h1 class="text-center text-white mb-4">Database Ruangan</h1><hr>
    <a href="{{ route('rooms.create') }}" class="btn btn-success mb-3">Tambah Ruangan Baru</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Lantai</th>
                <th>Gedung</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->floor }}</td>
                <td>{{ $room->building }}</td>
                <td>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
