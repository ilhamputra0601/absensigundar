@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">Dashboard Dosen</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Sales Card -->

        <div class="card info-card ">

            <div class="card-body">
                <h5 class="card-title text-center">SELAMAT DATANG DI<br> <span>WEB ABSENSI GUNADARMA</span></h5>

                <div class="d-flex text-start justify-center">
                    <ul class="list-unstyled">
                        <li>1. Untuk mengisi,mengedit,melihat hasil absensi silahkan klik tombol absensi</li>
                        <li>2. Untuk mencetak list mahasiswa yang berhak ikut UTS silahkan klik tombol cetak list uts</li>
                        <li>3. Untuk saat ini metode perkuliahan adalah (Daring,Luring,Hybird)</li>
                        <li>4. Pelaksanaan UTS/UAS (Daring,Luring,)</li>
                        <br>
                        <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>
                    </ul>
                </div>
            </div>

        </div>

        <section>
    </main><!-- End #main -->
@endsection
