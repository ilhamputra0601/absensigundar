@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">{{ $page }}</a></li>
                    <li class="breadcrumb-item">Data Presensi</li>
                    <li class="breadcrumb-item active">UAS</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Sales Card -->
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">Data Presensi M1 - M14</h5>
                <label class="form-label">INFORMATIKA</label>
                <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="15"
                    aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 15%;">
                        15%
                    </div>
                </div>
            </div>
        </div>

        <section>
    </main><!-- End #main -->
@endsection
