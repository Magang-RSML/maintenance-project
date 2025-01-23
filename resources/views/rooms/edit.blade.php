@extends('layouts.app')

@section('title', 'Edit Room')

@section('content')
<div class="container">
    <h1 class="text-center text-white mb-4">Edit Room</h1><hr>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Ruang</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $room->name }}" required>
        </div>

        <div class="mb-3">
            <label for="floor" class="form-label">Lantai</label>
            <input type="number" name="floor" id="floor" class="form-control" value="{{ $room->floor }}" required>
        </div>

        <div class="mb-3">
            <label for="building" class="form-label">Gedung</label>
            <input type="text" name="building" id="building" class="form-control" value="{{ $room->building }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
