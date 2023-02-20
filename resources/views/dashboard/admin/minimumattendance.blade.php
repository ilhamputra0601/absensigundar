@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Kehadiran Minimum</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- Sales Card -->
        <div class="card info-card ">
            <div class="card-body">
                <form method="POST" action="/dashboardadmin/minimumattendance">
                    @csrf
                    <h5 class="card-title">Kehadiran Minimum</h5>
                    <input type="text" name='value' required>%
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <section>
    </main><!-- End #main -->
@endsection
