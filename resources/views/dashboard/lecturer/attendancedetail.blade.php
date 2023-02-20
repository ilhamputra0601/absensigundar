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
            <h5 class="card-title">Cari Kelas</h5>
            <form action="/dashboardlecturer/attendancedetail">
                <div class="row mb-4">
                    <div class="col">
                        <label for="classroom_name" class="form-label">Pilih Kelas</label>
                        <select id="classroom_name" class="form-select" name="schedule_id" required>
                            <option value="" style="display: none;">--Pilih Kelas--</option>
                            @foreach ($schedules as $schedule)
                                <option value="{{ $schedule->id }}">{{ $schedule->classroom_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="week" class="form-label">Minggu ke-</label>
                        <select id="week" name="week" class="form-select" required>
                            <option value="" style="display: none;">--Minggu ke--</option>
                            <option value="1">1
                            </option>
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
                        <br>
                        <button id="submit-button" class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <hr>

        </section>
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
                            {{ $absents->first()->schedule->academic_year }}
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
            <div class="my-1">
                <form action="/dashboardlecturer/printattendance">
                    <input type="hidden" name="schedule_id" value="{{ $absents->first()->schedule->id }}">
                    <button class="btn rounded-bottom btn-primary">Lihat Hasil Presensi</button>
                </form>
            </div>
            {{-- inputan absensi belom --}}
            <div id="presensi">
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
            </div>
            <div class="d-flex justify-content-end col-sm-11">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            </form>
            <!-- End Default Table Example -->
            </div>
        </section>
    </main><!-- End #main -->
@endsection
