@extends('dashboard.dosen.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admmahasiswa">Dashboard</a></li>
                    <li class="breadcrumb-item">{{ $page }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">


            <div class="card ">
                <div class="card-body">

                    <h5 class="card-title text-center">{{ $page }} Akun</h5>
                    {{-- search --}}
                    <div class="d-flex justify-content-center">
                        <form class="col-xl-4 text-center ">
                            <!-- 2 column grid layout with text inputs for the first and last names -->

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form6Example1" class="form-control" />
                                        <label class="form-label" for="form6Example1">Masukan Email Baru</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form6Example1" class="form-control" />
                                        <label class="form-label" for="form6Example1">Buat Username Baru</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form6Example1" class="form-control" />
                                        <label class="form-label" for="form6Example1">Buat Password Baru</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
