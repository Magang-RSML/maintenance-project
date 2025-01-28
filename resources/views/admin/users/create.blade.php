@extends('admin.layouts.app')

@section('title', 'Add New User')

@section('content')
<div class="container">
    <h1 class="text-center text-white mb-4">Tambah User Baru</h1><hr>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="number" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-select" required>
                <option value="admin">Admin</option>
                <option value="it_staff">IT Staff</option>
                <option value="employee">Employee</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
