@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">Dashboard Admin</a></li>
                    <li class="breadcrumb-item active">Pengaturan Mahasiswa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!-- Sales Card -->
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">Atur Text Dashboard</h5>
                {{-- isi --}}
                <form method="POST" action="/dashboardadmin/studentsetting">
                    @csrf
                    @if (session()->has('success'))
                        <div class="alert alert-success col-lg-6" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <input type="hidden" name="usertype_id" value="3">
                    <input id="body" type="hidden" name="body" value="{{ $dashboardstudent->body }}">
                    <trix-editor input="body"></trix-editor>
                    <button type="submit" class="btn btn-primary mt-2">Ubah</button>
                </form>
                <h5 class="card-title">Atur Database</h5>
                <form action="/dashboardadmin/studentimport" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="customFile">Masukan/Perbarui List Mahasiswa</label>
                        <input type="file" class="form-control" id="customFile" name="file" />
                        <button class="btn btn-primary mt-2" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>


        <section>
    </main><!-- End #main -->
@endsection
