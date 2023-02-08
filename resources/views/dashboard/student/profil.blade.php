@extends('dashboard.mahasiswa.main')

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

        <div class="">

            <div class="card">
                <h5 class="card-title">Selamat Datang</h5>
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <div class="d-flex ">
        <img src="assets/img/profile-img.jpg" alt="Profile" class="p-3" width="300">
        <div class="mt-3">
            <div class="row mb-2">
                <div class="col">
                  <label class="form-label" for="form6Example2">Nama :</label>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                  <label class="form-label" for="form6Example2">NPM:</label>
                </div>
                </div>
              <div class="row mb-2">
                <div class="col">
                  <label class="form-label" for="form6Example2">Kelas: </label>
                </div>
                </div>
              <div class="row mb-2">
                <div class="col">
                  <label class="form-label" for="form6Example2">fakultas: </label>
                </div>
                </div>
              <div class="row mb-2">
                <div class="col">
                  <label class="form-label" for="form6Example2">Jurusan : </label>
                </div>
                </div>
              <div class="row mb-2">
                <div class="col">
                  <label class="form-label" for="form6Example2">Tahun Ajaran: </label>
                </div>
                </div>
              <div class="row mb-2">
                <div class="col">
                    <input type="file" class="form-control" id="customFile" />
                </div>
                </div>
            </div>
    </div>
        <hr>
        <h5 class="card-title">Informasi Akun</h5>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="justify-start">
            <div class="row mb-2">
              <div class="col">
                <label class="form-label" for="form6Example2">Email :</label>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label" for="form6Example2">Username :</label>
              </div>
              </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label" for="form6Example2">Password : </label>
              </div>
              </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end" onclick="location.href='/ubahdata'">Ubah</button>
</div>
</div>
</section>

</main><!-- End #main -->
