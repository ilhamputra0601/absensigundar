@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item"><a href="/dashboardlecturer/utslist">List UTS</a></li>
                    <li class="breadcrumb-item active">{{ $absents->first()->schedule->classroom_name }}</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cari File Uts</h5>
                    {{-- search --}}
                    <form action="/dashboardlecturer/utslistdetail" class="row g-3">
                        <div class="col-lg-5 col-md-12 mb-3">
                            <div class="form-outline">
                                <select name="schedule_id" class="form-select" aria-label="Default select example" required>
                                    <option value="" style="display: none;">Pilih Kelas</option>
                                    @foreach ($schedules as $schedule)
                                        <option value="{{ $schedule->id }}">{{ $schedule->classroom_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Cari</button>
                        </div>
                    </form>
                    <div id="anjir_keren_banget_ham" class="card border border-primary rounded-3 shadow-lg "
                        style=" max-width: 500px;">
                        <div class="card-header bg-light text-center">
                            <div class="d-flex flex-row mb-2  " style="padding-left: 10px;">
                                <div class="p-2 g-col-6 ">
                                    <img src="/img/gundar.png" alt="" width="40">
                                </div>
                                <div class="p-2 g-col-6 ">
                                    <h6 class="mt-2">UNIVERSITAS GUNADARMA</h6>
                                </div>
                            </div>
                            <hr class="mx-3 text-primary" style="margin-top: -10px">
                            <h3><strong>KARTU LIST UTS <p>(Untuk Dosen)</p></strong> </h3>
                        </div>
                        <h6 class="text-center ">Daftar Mahasiswa Peserta UTS</h6>
                        <div id="huhuy" class="card-body border  rounded-3 m-3 text-dark">
                            <p class="pt-3">Kelas : {{ $absents->first()->schedule->classroom_name }}</p>
                            <p>Mata Kuliah: {{ $absents->first()->schedule->course_name }}</p>
                            <hr class="text-primary">
                            <h6 class="card-subtitle mb-2 text-muted">Dapat mengikuti:</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NPM</th>
                                        <th scope="col">Nama</th>
                                    </tr>
                                </thead>
                                @foreach ($students as $student)
                                    <tbody>
                                        <th scope="col">{{ $loop->iteration }}</th>
                                        <th scope="col">{{ $student->npm }}</th>
                                        <th scope="col">{{ $student->name }}</th>
                                    </tbody>
                                @endforeach
                            </table>
                            <hr class="text-primary">
                            <h6 class="card-subtitle mb-2 text-muted">Tidak dapat mengikuti ujian:</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NPM</th>
                                        <th scope="col">Nama</th>
                                    </tr>
                                </thead>
                                @foreach ($students_fail as $student_fail)
                                    <tbody>
                                        <th scope="col">{{ $loop->iteration }}</th>
                                        <th scope="col">{{ $student_fail->npm }}</th>
                                        <th scope="col">{{ $student_fail->name }}</th>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <button class="btn rounded-bottom btn-primary mx-3" onclick="printz()">Download List</button>
                    <form action="/dashboardlecturer/printattendanceuts">
                        <input type="hidden" name="schedule_id" value="{{ $absents->first()->schedule->id }}">
                        <button class="btn rounded-bottom btn-primary mx-3 mt-3">Download Bukti Absensi</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script>
        function printz() {
            var printContents = document.getElementById("anjir_keren_banget_ham").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
