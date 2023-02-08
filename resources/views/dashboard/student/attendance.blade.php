@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardstudent">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Absen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Cari Matakuliah</h5>
                    {{-- search --}}
                    <form>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form6Example1" class="form-control" />
                                    <label class="form-label" for="form6Example1">Matkul</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="number" id="form6Example2" class="form-control" />
                                    <label class="form-label" for="form6Example2">Minggu Ke</label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4 justify-content-end">Search</button>
                    </form>

                    <hr>

                    <div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label" for="form6Example1">Fakultas :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1">Matakuliah :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1">Tahun Ajaran :</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label" for="form6Example1">Jurusan :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1">SKS :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1">Dosen Pengajar :</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label" for="form6Example1">Tingkat :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1">Jadwal :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1"></label>
                            </div>
                        </div>
                        <div class="row mb-4 ">
                            <div class="col">
                                <label class="form-label" for="form6Example1">Kelas :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1">Lokasi Kuliah :</label>
                            </div>
                            <div class="col">
                                <label class="form-label" for="form6Example1"></label>
                            </div>
                        </div>


                    </div>


                    <h5 class="card-title">Table Presensi</h5>

                    <!-- Default Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">NPM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Hadir</th>
                                <th scope="col">Izin</th>
                                <th scope="col">Sakit</th>
                                <th scope="col">alpha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>57418655</td>
                                <td>ilham ganteng</td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
