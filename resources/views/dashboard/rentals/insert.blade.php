@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>rental Insert</h1>
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
                            <h5 class="card-title">rental Form</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ url('/rentalsStore') }}" method="POST" enctype="multipart/form-data">

                                @csrf


                                <div class="form-floating mb-3">
                                    <select name="customer_id" id="" class="form-select mb-3">
                                        <option value="0" selected disabled>Select Customer name</option>
                                        @foreach ($CustomerId as $sr)
                                            <option value="{{ $sr->id }}">{{ $sr->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingText">Customer Name</label>
                                    @error('customer_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>


                                <div class="form-floating mb-3">
                                    <select name="car_id" id="" class="form-select mb-3">
                                        <option value="0" selected disabled>Select Car No</option>
                                        @foreach ($CarId as $sr)
                                        {{-- @if ($rental == $rentals->rental_date || $rentals->return_date) --}}
                                        <option disabled value="{{ $sr->id }}">{{ $sr->Make }}</option>
                                        {{-- @else --}}
                                        <option value="{{ $sr->id }}">{{ $sr->Make }}</option>
                                        {{-- @endif --}}
                                        @endforeach
                                    </select>
                                    <label for="floatingText">Car no</label>
                                    @error('car_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" name="rental_date" class="form-control"
                                        value="{{ old('rental_date') }}" id="floatingText" placeholder="2024-06-08">
                                    <label for="floatingText">rental_date</label>
                                    @error('rental_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" name="return_date" class="form-control"
                                        value="{{ old('return_date') }}" id="floatingText" placeholder="2024-06-10">
                                    <label for="floatingText">return_date</label>
                                    @error('return_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <label for="formFileLg" class="form-label">Status</label>
                                <select name="status" id="" class="form-select mb-3">
                                    <option value="0" selected disabled>Select Status</option>
                                    <option value="1">Booked</option>
                                    <option value="2">Checked-In</option>
                                    <option value="3">Cancelled</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                                <div class="form-floating mb-3">
                                    <input type="number" name="total" class="form-control"
                                        value="{{ old('total') }}" id="floatingText" placeholder="total">
                                    <label for="floatingText">total</label>
                                    @error('total')
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
