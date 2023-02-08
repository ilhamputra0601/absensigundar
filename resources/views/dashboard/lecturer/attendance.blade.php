@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Absen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <h5 class="card-title">Cari Kelas</h5>
            {{-- search belom --}}
            <form>
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <select name="Kelas" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Kelas</option>
                            <option value="1">4IA01</option>
                            <option value="2">4IA02</option>
                        </select>
                    </div>
                    <div class="col">
                        <select name="MingguKe" class="form-select" aria-label="Default select example">
                            <option selected>Minggu ke-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
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
                        <label class="form-label" for="form6Example1">Jam Perkuliahan :</label>
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

            {{-- inputan absensi belom --}}
            <h5 class="card-title">Table Presensi</h5>
            <form>
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Hadir</th>
                            <th scope="col">Alpha</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Sakit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>57418655</td>
                            <td>ilham ganteng</td>
                            <td>
                                <div class="form-check">
                                    <input value="1" class="form-check-input" type="radio" name="ilham ganteng">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input value="2" class="form-check-input" type="radio" name="ilham ganteng">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input value="3" class="form-check-input" type="radio" name="ilham ganteng">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input value="4" class="form-check-input" type="radio" name="ilham ganteng">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>57418654</td>
                            <td>jauhar jelek</td>
                            <td>
                                <div class="form-check">
                                    <input value="1" class="form-check-input" type="radio" name="jauhar jelek">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input value="2" class="form-check-input" type="radio" name="jauhar jelek">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input value="3" class="form-check-input" type="radio" name="jauhar jelek">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input value="4" class="form-check-input" type="radio" name="jauhar jelek">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end col-sm-11">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
            <!-- End Default Table Example -->
            </div>
        </section>
    </main><!-- End #main -->
@endsection
