@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardstudent">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Presensi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cari Matakuliah</h5>
                    <form action="/dashboardlecturer/attendancedetail">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="classroom_name" class="form-label">Pilih Matkul</label>
                                <select id="classroom_name" class="form-select" name="schedule_id"
                                    onclick="changeMargin1()">
                                    <option value="">--Pilih Matkul--</option>
                                    {{-- @foreach ($schedules as $schedule)
                                            <option value="{{ $schedule->id }}">{{ $schedule->classroom_name }}
                                </option>
                                @endforeach --}}
                                </select>
                            </div>
                            <div class="col">
                                <label for="week" class="form-label">Minggu ke-</label>
                                <select id="week" name="week" class="form-select" onclick="changeMargin();">
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
                                <button class="btn btn-primary" type="submit" style="margin-top:8px;">Cari</button>
                            </div>
                        </div>
                    </form>
                    {{-- get --}}
                    <section id="hamz" class="section" style="margin-bottom:100px;">
                        <div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Kelas :
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Matakuliah :
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Minggu Ke- : </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Fakultas :
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">SKS : </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Lokasi Kuliah :
                                    </label>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Jurusan :
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Tahun Ajaran : </label>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Jam Perkuliahan :
                                    </label>
                                </div>

                            </div>
                            <div class="row mb-4 ">
                                <div class="col">
                                    <label class="form-label" for="form6Example1">Region :
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
                                    <th scope="col">No</th>
                                    <th scope="col">Minggu ke</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- End Default Table Example -->
                </div>
        </section>
        </div>
        </div>
        </section>
    </main>

    <script>
        function changeMargin1() {
            const margin = document.querySelector('#hamz');
            margin.style.marginTop = '100px';
        }

        function changeMargin() {
            const margin = document.querySelector('#hamz');
            margin.style.marginTop = '370px';
        }
        const hamz = document.querySelector('#week');
        const hamz1 = document.querySelector('#classroom_name');
        hamz.addEventListener('mouseleave', resetMargin);
        hamz1.addEventListener('mouseleave', resetMargin);

        function resetMargin() {
            const margin = document.querySelector('#hamz');
            margin.style.marginTop = '0';
        }
    </script>
@endsection
