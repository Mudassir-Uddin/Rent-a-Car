@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>car Insert</h1>
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
                            <h5 class="card-title">car Form</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ url('/carsStore') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <select name="brand_id" id="" class="form-select mb-3">
                                    <option value="0" selected disabled>Select Brand</option>
                                    @foreach ($BrandId as $sr)
                                    {{-- @if ($rental == $rentals->rental_date || $rentals->return_date) --}}
                                    {{-- <option disabled value="{{ $sr->id }}">{{ $sr->registration_number }}</option> --}}
                                    {{-- @else --}}
                                    <option value="{{ $sr->id }}">{{ $sr->name }}</option>
                                    {{-- @endif --}}
                                    @endforeach
                                </select>

                                <div class="form-floating mb-3">
                                    <input type="text" name="Model" class="form-control" value="{{ old('Model') }}"
                                        id="floatingText" placeholder="Model">
                                    <label for="floatingText">Model</label>
                                    @error('Model')
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

                                <div class="form-floating mb-3">
                                    <input type="date" name="date" id="floatingText" class="form-control"
                                        value="{{ old('date') }}" placeholder="date">
                                    <label for="floatingText">date</label>
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="registration_number" class="form-control"
                                        value="{{ old('registration_number') }}" id="floatingText"
                                        placeholder="registration_number">
                                    <label for="floatingText">registration_number</label>
                                    @error('registration_number')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <select name="color_id" id="" class="form-select mb-3">
                                    <option value="0" selected disabled>Select Color</option>
                                    @foreach ($ColorId as $sr)
                                    {{-- @if ($rental == $rentals->rental_date || $rentals->return_date) --}}
                                    {{-- <option disabled value="{{ $sr->id }}">{{ $sr->registration_number }}</option> --}}
                                    {{-- @else --}}
                                    <option value="{{ $sr->id }}">{{ $sr->name }}</option>
                                    {{-- @endif --}}
                                    @endforeach
                                </select>

                                <select name="car_id" id="" class="form-select mb-3">
                                    <option value="0" selected disabled>Select Transmission Type</option>
                                    @foreach ($TransmissionId as $sr)
                                    {{-- @if ($rental == $rentals->rental_date || $rentals->return_date) --}}
                                    {{-- <option disabled value="{{ $sr->id }}">{{ $sr->registration_number }}</option> --}}
                                    {{-- @else --}}
                                    <option value="{{ $sr->id }}">{{ $sr->name }}</option>
                                    {{-- @endif --}}
                                    @endforeach
                                </select>

                                <div class="form-floating mb-3">
                                    <input type="number" name="daily_rate" class="form-control"
                                        value="{{ old('daily_rate') }}" id="floatingText" placeholder="daily_rate">
                                    <label for="floatingText">daily_rate</label>
                                    @error('daily_rate')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <label for="formFileLg" class="form-label">Status</label>
                                <select name="status" id="" class="form-select mb-3">
                                    <option value="0" selected disabled>Select Status</option>
                                    <option value="1">Available</option>
                                    <option value="2">Ranted</option>
                                    <option value="3">Under Maintenance</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Insert</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
