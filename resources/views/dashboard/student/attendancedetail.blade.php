@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardstudent">{{ $page }}</a></li>
                    <li class="breadcrumb-item"><a href="/dashboardstudent/attendance"> Presensi </a></li>
                    <li class="breadcrumb-item active">{{ $absents->first()->schedule->course_name }}</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cari Matakuliah</h5>
                    <form action="/dashboardstudent/attendancedetail">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="classroom_name" class="form-label">Pilih Matkul</label>
                                <select id="classroom_name" class="form-select" name="schedule_id"
                                    onclick="changeMargin1()">
                                    <option value="" style="display: none;">--Pilih Matkul--</option>
                                    @foreach ($schedules as $schedule)
                                        <option value="{{ $schedule->id }}">{{ $schedule->course_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <br>
                                <button class="btn btn-primary" type="submit" style="margin-top:8px;">Cari</button>
                            </div>
                        </div>
                    </form>
                    <section id="hamz" class="section" style="margin-bottom:100px;">
                        <div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Kelas :
                                        {{ $absents->first()->schedule->classroom_name }}
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Matakuliah :
                                        {{ $absents->first()->schedule->course_name }}
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Minggu Ke- :
                                        1 - 14
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Fakultas :
                                        {{ $absents->first()->student->classroom->major->faculty->name }}
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">SKS :
                                        {{ $absents->first()->schedule->course->SKS }}
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Lokasi Kuliah :
                                        {{ $absents->first()->schedule->location_name }}
                                    </label>
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
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Dosen Pengajar :
                                        {{ $absents->first()->schedule->lecturer->name }}
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- inputan absensi belom --}}
                        <h5 class="card-title ">Table Presensi</h5>
                        @csrf
                        <input type="hidden" name="week" value="">
                        <input type="hidden" name="schedule_id" value="">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Minggu ke</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absents as $absent)
                                    <tr>
                                        <td scope="col">{{ $absent->week }}</td>
                                        @isset($absent->absenttype->name)
                                            <td scope="col">
                                                {{ $absent->absenttype->name }}
                                            </td>
                                        @endisset
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
        </section>
        </div>
        </div>
        </section>
    </main>
@endsection
