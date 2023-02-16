@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>Dashboard Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">Dashboard Admin</a></li>
                    <li class="breadcrumb-item active">Pengaturan Dosen</li>
                </ol>
            </nav>
        </div>

        <!-- Sales Card -->

        <div class="card info-card ">

            <div class="card-body">
                <h5 class="card-title">Atur Text Dashboard</h5>

                {{-- isi --}}
                <form method="POST" action="/dashboardadmin/lecturersetting">
                    @csrf
                    @if (session()->has('success'))
                        <div class="alert alert-success col-lg-6" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <input type="hidden" name="usertype_id" value="2">
                    <input id="body" type="hidden" name="body" value="{{ $dashboardlecturer->body }}">
                    <trix-editor input="body"></trix-editor>
                    <button type="submit" class="btn btn-primary mt-2">Ubah</button>
                </form>
                <h5 class="card-title">Atur Database</h5>
                <form action="/dashboardadmin/lecturerimport" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5">
                        <label class="form-label" for="customFile">Masukan List Dosen</label>
                        <input type="file" class="form-control" id="customFile" name="file" />
                        <button class="btn btn-primary mt-2" type="submit">Upload</button>
                    </div>
                </form>
                <form action="/dashboardadmin/scheduleimport" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="customFile">Masukkan Jadwal Dosen</label>
                        <input type="file" class="form-control" id="customFile" name="file" />
                        <button class="btn btn-primary mt-2" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        <section>
    </main><!-- End #main -->
@endsection
