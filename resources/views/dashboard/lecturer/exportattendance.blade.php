@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item"><a href="/dashboardlecturer/attendance">Presensi</a></li>
                    <li class="breadcrumb-item active">{{ $schedule->classroom_name }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div id="printabsents" class="pt-3">
            <h5>Absensi Kelas {{ $schedule->classroom_name }}</h5>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">M1</th>
                        <th scope="col">M2</th>
                        <th scope="col">M3</th>
                        <th scope="col">M4</th>
                        <th scope="col">M5</th>
                        <th scope="col">M6</th>
                        <th scope="col">M7</th>
                        <th scope="col">M8</th>
                        <th scope="col">M9</th>
                        <th scope="col">M10</th>
                        <th scope="col">M11</th>
                        <th scope="col">M12</th>
                        <th scope="col">M13</th>
                        <th scope="col">M14</th>
                        <th scope="col">Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->npm }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->week1 }}</td>
                            <td>{{ $row->week2 }}</td>
                            <td>{{ $row->week3 }}</td>
                            <td>{{ $row->week4 }}</td>
                            <td>{{ $row->week5 }}</td>
                            <td>{{ $row->week6 }}</td>
                            <td>{{ $row->week7 }}</td>
                            <td>{{ $row->week8 }}</td>
                            <td>{{ $row->week9 }}</td>
                            <td>{{ $row->week10 }}</td>
                            <td>{{ $row->week11 }}</td>
                            <td>{{ $row->week12 }}</td>
                            <td>{{ $row->week13 }}</td>
                            <td>{{ $row->week14 }}</td>
                            <td>{{ $row->percentage }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="/dashboardlecturer/exportattendance">
                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                <button class="btn rounded-bottom btn-success mx-3">
                    Export Absensi
                </button>
            </form>
        </div>
        <br>
    </main><!-- End #main -->
@endsection
