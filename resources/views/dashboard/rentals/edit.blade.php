@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>rental Edit</h1>
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
                            <form action="{{ url('/rentalsupdate') }}/{{ $st->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <select name="customer_id" id="" class="form-select mb-3">
                                        @foreach ($CustomerId as $ct)
                                            {{-- <option value="0">Select SubServices</option> --}}
                                            @if ($ct->id == $st->customer_id)
                                                <option value="{{$ct->id}}" selected>{{$ct->name}}</option>
                                            @else
                                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="car_id" id="" class="form-select mb-3">
                                        @foreach ($CarId as $ct)
                                            {{-- <option value="0">Select SubServices</option> --}}
                                            @if ($ct->id == $st->car_id)
                                                <option value="{{$ct->id}}" selected>{{$ct->registration_number}}</option>
                                            @else
                                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingText" value="{{ $st->rental_date }}"
                                        name="rental_date" placeholder="2024=06-08">
                                    <label for="floatingText">rental_date</label>
                                    @error('rental_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingText" value="{{ $st->return_date }}"
                                        name="return_date" placeholder="2024-06-10">
                                    <label for="floatingText">return_date</label>
                                    @error('return_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <label for="formFileLg" class="form-label">Status</label>
                                <select name="status" id="" class="form-select mb-3">
                                    @if ($st->status == 1)
                                        {{-- @foreach ($Service as $sr) --}}
                                        <option value="1">---Available---</option>
                                    @elseif ($st->status == 2)
                                        <option value="2">---Rented---</option>
                                        {{-- @endforeach --}}
                                    @elseif ($st->status == 3)
                                        <option value="3">---Maintenance---</option>
                                    @else
                                        <option value="4">---Reserved---</option>
                                    @endif
                                    <option value="1">Available</option>
                                    <option value="2">Rented</option>
                                    <option value="3">Maintenance</option>
                                    <option value="4">Reserved</option>
                                </select>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingText" value="{{ $st->total }}"
                                        name="total" placeholder="jhondoe">
                                    <label for="floatingText">total</label>
                                    @error('total')
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
