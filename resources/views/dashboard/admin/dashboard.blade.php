@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Sales Card -->
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">SELAMAT DATANG DI<br> WEB ABSENSI GUNADARMA</h5>
                <ul class="list-unstyled">
                    <li>1. Untuk mengisi,mengubah,mengatur akun dosen silahkan klik tombol Pengaturan Dosen</li>
                    <li>2. Untuk mengisi,mengubah,mengatur akun mahasiswa silahkan klik tombol Pengaturan Mahasiswa</li>
                    <li>3. Untuk melihat persentase kehadiran mahasiswa informatika klik tombol Data Absensi</li>
                    <li>4. Untuk mengatur profile klik nama&email diatas, lalu klik profile</li>
                </ul>
            </div>
        </div>
        <section>
    </main><!-- End #main -->
@endsection
