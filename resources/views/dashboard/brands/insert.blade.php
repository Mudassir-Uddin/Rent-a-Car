@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>brand Insert</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admindashboard">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Layouts</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Brand Form</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ url('/brandsStore') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        id="floatingText" placeholder="Name">
                                    <label for="floatingText">Name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">Image</label>
                                    <input class="form-control form-control-lg" name="img" id="formFileLg"
                                        type="file">
                                    @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Insert</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
