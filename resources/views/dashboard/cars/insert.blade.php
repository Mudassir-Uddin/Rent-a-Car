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

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" name="make"
                                        value="{{ old('make') }}" placeholder="make">
                                    <label for="floatingText">make</label>
                                    @error('make')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

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

                                <div class="form-floating mb-3">
                                    <input type="text" name="color" class="form-control" value="{{ old('color') }}"
                                        id="floatingText" placeholder="color">
                                    <label for="floatingText">color</label>
                                    @error('color')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

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
