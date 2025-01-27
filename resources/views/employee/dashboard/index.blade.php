@extends('employee.layouts.app')

@section('title', 'Dashboard Employee')

@section('content')
<div class="container">
    <h1>Selamat Datang, Employee!</h1>
    <p>Ini adalah halaman utama Employee.</p>
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Data Perangkat</h5>
                    <p class="card-text">Lihat dan ajukan pelaporan terkait perangkat.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Data Pelaporan</h5>
                    <p class="card-text">Pantau status pelaporan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
