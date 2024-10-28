@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>payment Insert</h1>
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
                            <h5 class="card-title">payment Form</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ url('/paymentsStore') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-floating mb-3">
                                    <select name="rental_id" id="" class="form-select mb-3">
                                        <option value="0" selected disabled>Select Rental</option>
                                        @foreach ($RentalId as $sr)
                                        {{-- @if ($payment == $payments->payment_date || $payments->return_date) --}}
                                        {{-- <option disabled value="{{ $sr->id }}">{{ $sr->registration_number }}</option> --}}
                                        {{-- @else --}}
                                        <option value="{{ $sr->id }}">{{ $sr->cars->registration_number }}</option>
                                        {{-- @endif --}}
                                        @endforeach
                                    </select>
                                    <label for="floatingText">Car NB</label>
                                    @error('rental_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="number" name="amount" class="form-control"
                                        value="{{ old('amount') }}" id="floatingText" placeholder="amount">
                                    <label for="floatingText">amount</label>
                                    @error('amount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="payment_method_id" id="" class="form-select mb-3">
                                        <option value="0" selected disabled>Select Payment Method</option>
                                        @foreach ($PM_id as $sr)
                                            <option value="{{ $sr->id }}">{{ $sr->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingText">Payment Method Name</label>
                                    @error('payment_method_id')
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
