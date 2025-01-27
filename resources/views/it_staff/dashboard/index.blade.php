@extends('it_staff.layouts.app')

@section('title', 'Dashboard IT Staff')

@section('content')
<div class="container">
    <h1>Selamat Datang, IT Staff!</h1>
    <p>Ini adalah halaman utama IT Staff.</p>
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Data Perangkat</h5>
                    <p class="card-text">Kelola dan pantau semua perangkat di sistem.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Data Pelaporan</h5>
                    <p class="card-text">Pantau dan tindak lanjuti semua pelaporan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
