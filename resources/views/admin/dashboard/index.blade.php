@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="text-center text-white mb-4">Dashboard</h1>
    <h1>Selamat Datang, Admin!</h1>
    <p>Ini adalah halaman utama admin.</p>
    <center><p>Selamat datang di aplikasi service dan maintenance perangkat elektronik.</p></center>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pengguna</h5>
                    <p class="card-text">10 Pengguna</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Ruang</h5>
                    <p class="card-text">5 Ruang</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Perangkat</h5>
                    <p class="card-text">20 Perangkat</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
