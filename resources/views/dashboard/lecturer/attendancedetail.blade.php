@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item"><a href="/dashboardlecturer/attendance">Presensi</a></li>
                    <li class="breadcrumb-item active">{{ $absents->first()->schedule->classroom_name }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <section class="section">
            <div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Kelas :
                            {{ $absents->first()->schedule->classroom_name }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Matakuliah :
                            {{ $absents->first()->schedule->course_name }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Minggu Ke- : {{ $absents->first()->week }}</label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Fakultas :
                            {{ $absents->first()->student->classroom->major->faculty->name }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">SKS :
                            {{ $absents->first()->schedule->course->SKS }}</label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Lokasi Kuliah :
                            {{ $absents->first()->schedule->location_name }}</label>
                    </div>

                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Jurusan :
                            {{ $absents->first()->student->classroom->major->name }}
                        </label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Tahun Ajaran :
                            {{ $absents->first()->schedule->course->academicyear }}
                        </label>
                    </div>
                    <div class="col">
                        <label class="form-label" for="form6Example1">Jam Perkuliahan :
                            {{ $absents->first()->schedule->time_description }}
                        </label>
                    </div>

                </div>
                <div class="row mb-4 ">
                    <div class="col">
                        <label class="form-label" for="form6Example1">Region :
                            {{ $absents->first()->student->classroom->region }}
                        </label>
                    </div>
                </div>
            </div>

            {{-- inputan absensi belom --}}
            <h5 class="card-title">Table Presensi</h5>
            <form action="/dashboardlecturer/attendancedetail" method="post">
                @csrf
                <input type="hidden" name="week" value="{{ $absents->first()->week }}">
                <input type="hidden" name="schedule_id" value="{{ $absents->first()->schedule_id }}">
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
                            <th scope="col">Status Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absents as $absent)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absent->student->npm }}</td>
                                <td>{{ $absent->student->name }}</td>
                                <td>
                                    <div class="form-check">
                                        <input value="1" class="form-check-input" type="radio"
                                            name="attendance[{{ $absent->student_id }}]">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input value="2" class="form-check-input" type="radio"
                                            name="attendance[{{ $absent->student_id }}]">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input value="3" class="form-check-input" type="radio"
                                            name="attendance[{{ $absent->student_id }}]">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input value="4" class="form-check-input" type="radio"
                                            name="attendance[{{ $absent->student_id }}]">
                                    </div>
                                </td>
                                @isset($absent->absenttype->name)
                                    <td>{{ $absent->absenttype->name }}</td>
                                @endisset
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
