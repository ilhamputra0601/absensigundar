@extends('login.main')
@section('container')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                    <img src="img\gundar.png" alt="gunadarma">
                                    <span class="d-none d-lg-block">Website Absensi Universitas Gunadarma</span>
                                </a>
                            </div><!-- End Logo -->
                            @if (session()->has('success'))
                                <div class="alert alert-success col-lg-9 text-center" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Lupa Password</h5>
                                        <p class="text-center small">Masukkan email yang terdaftar untuk mereset password
                                            anda!</p>
                                    </div>

                                    <form method="POST" action="{{ route('password.email') }}"
                                        class="row g-3 needs-validation" novalidate>
                                        @csrf

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control" id="email"
                                                    required>
                                                <div class="invalid-feedback">Masukkan Email Anda!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah Punya Akun? <a href="/login">Log in</a></p>
                                            <div class="filter">
                                                <a class="icon" href="#" data-bs-toggle="dropdown">Buat Akun</a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow mt-2">
                                                    <li><a class="dropdown-item" href="/registerlecturer">Dosen</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="/registerstudent">Mahasiswa</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
@endsection
