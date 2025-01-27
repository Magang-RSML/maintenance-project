@extends('layouts.styles')

@section('body')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">
            <h4 class="text-center">Admin Dashboard</h4><hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Data Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.rooms.index') }}">Data Ruang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.devices.index') }}">Data Perangkat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.workorders.index') }}">Data Pelaporan</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1 text-white">Admin Panel</span>
                </div>
            </nav>
            <!-- Page Content -->
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@endsection
