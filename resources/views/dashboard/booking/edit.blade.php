@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Booking_Details Edit</h1>
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
                            <h5 class="card-title">Booking_Details Form</h5>
                            <form action="{{ url('/Booking_Detailsupdate') }}/{{ $Booking_Details->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" value="{{ $Booking_Details->name }}"
                                        name="name" placeholder="jhondoe">
                                    <label for="floatingText">Name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
