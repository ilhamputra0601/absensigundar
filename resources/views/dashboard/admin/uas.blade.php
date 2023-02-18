@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardadmin">{{ $page }}</a></li>
                    <li class="breadcrumb-item">Kehadiran Minimum</li>
                    <li class="breadcrumb-item active">UAS</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!-- Sales Card -->
        <div class="card info-card ">
            <div class="card-body">
                <form method="POST" action="/dashboardadmin/uas">
                    @csrf
                    <h5 class="card-title">Kehadiran Minimum M1 - M14</h5>
                    <input type="text" name="value" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <section>
    </main><!-- End #main -->
@endsection
