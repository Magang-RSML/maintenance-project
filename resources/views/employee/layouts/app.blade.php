@extends('layouts.styles')

@section('body')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">
            <h4 class="text-center">Monitor Device System</h4><hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.devices.index') }}">Data Perangkat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.workorders.index') }}">Data Pelaporan</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1 text-white">Sistem Pemantauan Service & Maintenance Perangkat</span>
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
