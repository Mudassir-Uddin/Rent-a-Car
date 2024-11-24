@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>brand Edit</h1>
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

                    <div class="brandd">
                        <div class="brandd-body">
                            <h5 class="brandd-title">Brand Form</h5>
                            <form action="{{ url('/brandsupdate') }}/{{ $brand->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" value="{{ $brand->name }}"
                                        name="name" placeholder="jhondoe">
                                    <label for="floatingText">brand name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">brand Image</label>
                                    <input class="form-control  form-control " name="img" id="formFileLg"
                                        type="file">
                                    @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <br>
                                    @if ($brand->img != null)
                                        Old Image : <img src="{{ url($brand->img) }}" class="img-fluid rounded" width="80px"
                                            height="50px" />
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">eidt</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
