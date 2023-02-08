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
                                    <img src="../img/gundar.png" alt="gunadarma">
                                    <span class="d-none d-lg-block">Website Absensi Universitas Gunadarma</span>
                                </a>
                            </div><!-- End Logo -->
                            <div class="card mb-3">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Ubah Password</h5>
                                    <p class="text-center small">Masukkan email & password baru anda!</p>
                                </div>
                                <div class="card-body">
                                    {{-- Form --}}
                                    <form method="POST" action="{{ route('password.store') }}"
                                        class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail"
                                                required value="{{ old('email', $request->email) }}">
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
                                            <button class="btn btn-primary w-100" type="submit">Ubah</button>
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
