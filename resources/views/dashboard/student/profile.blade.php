@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardstudent">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <div class="justify-start">
                    <div class="row mb-4">
                        <div class="col">
                            <form action="/dashboardstudent/profile" method="POST">
                                @csrf
                                <h3>Nama : {{ auth()->user()->name }}</h3>
                                <h3>Email : {{ auth()->user()->email }}</h3>
                                <label class="form-label" for="email">Input Email Baru!</label>
                                <input type="email" name="email" id="email">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
