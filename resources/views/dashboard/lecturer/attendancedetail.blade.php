@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item"><a href="/dashboardlecturer/attendance">Presensi</a></li>
                    <li class="breadcrumb-item active">{{ $classroom->name }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Kelas : {{ $classroom->name }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Matakuliah : {{ $course->name }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Minggu Ke- : {{ $week }}</label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Fakultas :
                            {{ $classroom->major->faculty->name }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">SKS : {{ $course->SKS }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Lokasi Kuliah : {{ $location_name }}</label>
                    </div>

                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Jurusan : {{ $classroom->major->name }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Tahun Ajaran : {{ $course->academicyear }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Jam Perkuliahan : {{ $time_description }}</label>
                    </div>

                </div>
                <div class="row mb-4 ">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Region : {{ $classroom->region }}</label>
                    </div>
                </div>
            </div>

            {{-- inputan absensi belom --}}
            <h5 class="card-title">Table Presensi</h5>
            <form action="/dashboardlecturer/attendancedetail" method="post">
                @csrf
                <input type="hidden" name="week" value="1">
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
                        @foreach ($classroom->students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->npm }}</td>
                                <td>{{ $student->name }}</td>
                                <td>
                                    <div class="form-check">
                                        <input value="1" class="form-check-input" type="radio"
                                            name="{{ $student->id }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input value="2" class="form-check-input" type="radio"
                                            name="{{ $student->id }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input value="3" class="form-check-input" type="radio"
                                            name="{{ $student->id }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input value="4" class="form-check-input" type="radio"
                                            name="{{ $student->id }}">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
