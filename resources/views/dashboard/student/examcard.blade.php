@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardstudent">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Kartu Ujian</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">


            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Cari {{ $page }}</h5>

                    <img src="https://source.unsplash.com/600x400?babi" alt="W3Schools" width="104" height="142">

                    <a href="https://source.unsplash.com/600x400?babi" download> Download</a>
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
