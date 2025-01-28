@extends('admin.layouts.app')

@section('title', 'Add New Room')

@section('content')
<div class="container">
    <h1 class="text-center text-white mb-4">Tambah Ruangan Baru</h1><hr>
    <form action="{{ route('admin.rooms.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Ruang</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="floor" class="form-label">Lantai</label>
            <input type="number" name="floor" id="floor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="building" class="form-label">Gedung</label>
            <input type="text" name="building" id="building" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
