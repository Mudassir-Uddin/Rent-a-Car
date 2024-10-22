@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>customer Edit</h1>
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
                            <h5 class="card-title">Customer Form</h5>
                            <form action="{{ url('/customersupdate') }}/{{ $customer->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" value="{{ $customer->name }}"
                                        name="name" placeholder="jhondoe">
                                    <label for="floatingText">Customer Name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">Customer Image</label>
                                    <input class="form-control  form-control " name="img" id="formFileLg"
                                        type="file">
                                    @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <br>
                                    @if ($customer->img != null)
                                        Old Image : <img src="{{ url($customer->img) }}" class="img-fluid rounded"
                                            width="80px" height="50px" />
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" value="{{ $customer->email }}"
                                        name="email" placeholder="jhondoe">
                                    <label for="floatingText">email</label>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingText" value="{{ $customer->phone }}"
                                        name="phone" placeholder="Phone">
                                    <label for="floatingText">Phone</label>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="Text" class="form-control" id="floatingText" value="{{ $customer->driver_license_number }}"
                                        name="driver_license_number" placeholder="driver_license_number">
                                    <label for="floatingText">driver_license_number</label>
                                    @error('driver_license_number')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="Text" class="form-control" id="floatingText" value="{{ $customer->address }}"
                                        name="address" placeholder="Address">
                                    <label for="floatingText">Address</label>
                                    @error('address')
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
