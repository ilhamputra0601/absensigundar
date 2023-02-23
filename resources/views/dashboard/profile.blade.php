@extends('dashboard.main')

@section('container')
    <main id="main" class="main">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>Profile</h1>
        </div>
        <div class="p-4">
            <h5>Nama : {{ auth()->user()->name }}</h5>
            <h5>Email : {{ auth()->user()->email }}</h5>
            <hr>
            <form action="/dashboard/profile" method="POST">
                @csrf
                <input type="email" name="email" id="email">
                <button class="btn btn-primary m-2" type="submit">Ubah Email</button>
            </form>
        </div>
    </main>
@endsection
