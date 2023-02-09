@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Presensi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <h5 class="card-title">Cari Kelas</h5>
            <form action="/dashboardlecturer/attendancedetail">
                <div class="row mb-4">
                    <div class="col">
                        <label for="classroom_name" class="form-label">Pilih Kelas</label>
                        <select id="classroom_name" class="form-select" name="schedule_id">
                            <option value="">--Pilih Kelas--</option>
                            @foreach ($schedules as $schedule)
                                <option value="{{ $schedule->id }}">{{ $schedule->classroom_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="week" class="form-label">Minggu ke-</label>
                        <select id="week" name="week" class="form-select">
                            <option value="">--Minggu ke--</option>
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
                        <br>
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection
