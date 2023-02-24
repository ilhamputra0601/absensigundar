@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">SELAMAT DATANG DI<br> WEB ABSENSI GUNADARMA</h5>
                <hr>
                {!! $dashboardlecturer->body !!}
            </div>
        </div>
        <section>
    </main><!-- End #main -->
@endsection
