@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">{{ $page }}</a></li>
                    <li class="breadcrumb-item">Olah Data Absensi</li>
                    <li class="breadcrumb-item active">UTS</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Sales Card -->

        <div class="card info-card ">

            <div class="card-body">

                <form action="">
                    <h5 class="card-title">Olah Data Absensi M10</h5>
                    <label class="form-label">FIKTI</label>
                    <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="15"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 15%"></div>
                    </div>
                    <label class="form-label">FE</label>
                    <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 25%"></div>
                    </div>
                    <label class="form-label">FTI</label>
                    <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="45"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 45%"></div>
                    </div>
                    <label class="form-label">FK</label>
                    <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%"></div>
                    </div>
                    <label class="form-label">FPSI</label>
                    <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end">Proses</button>
                </form>

                <hr>
                <h5 class="card-title">Proses Selesai</h5>
                <form action="">
                    <label class="form-label">Upload List UTS ke Laman Dosen</label>
                    <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end">Proses</button>
                    <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end">Download
                        Hasil</button>
                </form>
                <hr>

                <form action="">
                    <label class="form-label">Proses List UTS Laman Mahasiswa</label>
                    <button type="button" class="btn btn-primary btn-sm">Jenis Ujian</button>
                    <div class="progress mb-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end">Proses</button>
                    <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end">Download
                        Hasil</button>
                </form>

            </div>
        </div>


        <section>
    </main><!-- End #main -->
@endsection
