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

        <!-- Sales Card -->
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title text-center">SELAMAT DATANG DI<br> <span>WEB ABSENSI GUNADARMA</span></h5>

                <div class="d-flex text-start justify-center">
                    <ul class="list-unstyled">
                        <li>1. Untuk mengisi,mengedit,melihat hasil absensi silahkan klik tombol absensi</li>
                        <li>2. Untuk mengolah laman mhs silakan klik blabla....</li>
                        <br>
                        <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>
                    </ul>
                </div>
            </div>
        </div>
        <section>
    </main><!-- End #main -->
@endsection
