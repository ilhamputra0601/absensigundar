@extends('dashboard.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardlecturer">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">List Uts</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">


            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Cari File Uts</h5>
                    {{-- search --}}
                    <form>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col-lg-5">
                                <div class="form-outline">
                                    <select name="Kelas" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Kelas</option>
                                        <option value="1">4IA01</option>
                                        <option value="2">4IA02</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit"
                                class="btn btn-primary btn-block mb-4 justify-content-end row mb-4 col-sm-2 pl-2 ">Search</button>
                    </form>

                    <hr>

                    <img src="https://source.unsplash.com/600x400?babi" alt="W3Schools" width="104" height="142">

                    <a href="https://source.unsplash.com/600x400?babi" download> Download</a>
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
