@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardstudent">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Kartu UAS</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kartu UAS</h5>
                    <div id="busetdah_keren_banget_ham" class="card border border-primary rounded-3 shadow-lg "
                        style=" max-width: 500px;">
                        <div class="card-header bg-light text-center">
                            <div class="d-flex flex-row mb-2" style="padding-left: 10px;">
                                <div class="p-2 g-col-6 ">
                                    <img src="/img/gundar.png" alt="" width="40">
                                </div>
                                <div class="p-2 g-col-6 ">
                                    <h6 class="mt-2">UNIVERSITAS GUNADARMA</h6>
                                </div>
                            </div>
                            <hr class="mx-3 text-primary" style="margin-top: -10px">
                            <h3 class="pb-2"><strong>KARTU <br> UJIAN AKHIR SEMESTER</strong></h3>
                        </div>
                        <div class="card-body border  rounded-3 mx-3 mb-3 text-dark">
                            <div class="d-flex flex-row mt-3">
                                <div>
                                    <img src="/img/gundar.png" alt="" width="150">
                                </div>
                                <div id="huhuy" style="padding-left: 30px;">
                                    <p>NAMA : {{ $student->name }}</p>
                                    <p>NPM : {{ $student->npm }}</p>
                                    <p>KELAS : {{ $student->classroom->name }}</p>
                                    <p>FAKULTAS : {{ $student->classroom->major->faculty->name }}</p>
                                    <P>JURUSAN : {{ $student->classroom->major->name }}</P>
                                </div>
                            </div>
                            <hr class="text-primary">
                            <h6 class="card-subtitle mb-2 text-muted">Mata Kuliah Yang Dapat Diikuti:</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Kode</th>
                                    </tr>
                                </thead>
                                @foreach ($schedules as $schedule)
                                    <tbody>
                                        <th scope="col">{{ $loop->iteration }}</th>
                                        <th scope="col">{{ $schedule->course->name }}</th>
                                        <th scope="col">{{ $schedule->course->coursecode }}</th>
                                    </tbody>
                                @endforeach
                            </table>
                            <hr class="text-primary">
                            <h6 class="card-subtitle mb-2 text-muted">Mata Kuliah Yang Tidak dapat diikuti:</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Kode</th>
                                    </tr>
                                </thead>
                                @foreach ($schedules_fail as $schedule_fail)
                                    <tbody>
                                        <th scope="col">{{ $loop->iteration }}</th>
                                        <th scope="col">{{ $schedule_fail->course->name }}</th>
                                        <th scope="col">{{ $schedule_fail->course->coursecode }}</th>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="text-center">
                            <p style="font-size: 14px">Kartu ini harap dibawa selama masa ujian semester (UAS) <br> Sebagai
                                syarat untuk mengikuti ujian</p>
                        </div>
                        <hr style="margin-left:310px; margin-right:13px; margin-bottom: 3px" class="rounded">
                        <div class="d-flex justify-content-end">
                            <p
                                style="font-size: 13px; font-weight: bold; margin-right:13px;  border: none;
                                border-top: 2px solid rgb(136, 136, 181);">
                                Admin Absensi Gunadarma
                            </p>
                        </div>
                    </div>

                    <button class="btn rounded-bottom btn-primary mx-3" onclick="printz()">Download</button>
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->

    <style>
        #huhuy p {
            margin-bottom: 1px;
        }
    </style>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function printz() {
            var printContents = document.getElementById("busetdah_keren_banget_ham").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
