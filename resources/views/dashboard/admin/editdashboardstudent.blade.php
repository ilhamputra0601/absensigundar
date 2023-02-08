@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Ubah Dashboard Mahasiswa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Sales Card -->

        <div class="card info-card ">

            <div class="card-body">


                <h5 class="card-title">Atur Text Dashboard</h5>

                <!-- Quill Editor Full -->

                <div class="quill-editor-full">
                    <p>Hello World!</p>
                    <p>This is Quill <strong>full</strong> editor</p>
                </div>
                <!-- End Quill Editor Full -->
                <h5 class="card-title">Atur Database</h5>
                <div class="mb-3">
                    <label class="form-label" for="customFile">Masukan/Perbarui List Mahasiswa</label>
                    <input type="file" class="form-control" id="customFile" />
                </div>
            </div>
        </div>


        <section>
    </main><!-- End #main -->
@endsection
