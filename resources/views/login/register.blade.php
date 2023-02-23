@extends('login.main')
@section('container')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-5">
                                <a href="/login" class="logo d-flex align-items-center w-auto">
                                    <img src="img\gundar.png" alt="gunadarma">
                                    <span class="d-none d-lg-block">Website Presensi Jurusan Teknik Informatika Universitas
                                        Gunadarma</span>
                                </a>
                                </a>
                            </div><!-- End Logo -->

                            @if (session()->has('error'))
                                <div class="alert alert-danger col-md-9" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                                        <p class="text-center small">Masukkan identitas anda!</p>
                                    </div>

                                    <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation"
                                        novalidate>
                                        @csrf

                                        @if (Request::is('registerlecturer'))
                                            <input type="hidden" name="usertype_id" id="usertype_id" value="2">
                                            <div class="col-12">
                                                <label for="nidn" class="form-label">NIDN</label>
                                                <input type="text" name="nidn" class="form-control" id="nidn"
                                                    required>
                                                <div class="invalid-feedback">Masukkan NIDN Anda!</div>
                                            </div>
                                        @endif

                                        @if (Request::is('registerstudent'))
                                            <input type="hidden" name="usertype_id" id="usertype_id" value="3">
                                            <div class="col-12">
                                                <label for="npm" class="form-label">NPM</label>
                                                <input type="text" name="npm" class="form-control" id="npm"
                                                    required>
                                                <div class="invalid-feedback">Masukkan NPM Anda!</div>
                                            </div>
                                        @endif

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail"
                                                required>
                                            <div class="invalid-feedback">Masukkan Email Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword"
                                                required>
                                            <div class="invalid-feedback">Masukkan Password Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPasswordConfirmation" class="form-label">Konfirmasi
                                                Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="yourPasswordConfirmation" required>
                                            <div class="invalid-feedback">Masukkan Password Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah Punya Akun? <a href="/login">Log in</a></p>
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
