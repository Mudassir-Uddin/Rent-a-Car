@extends('layout.db_HF')
@section('mydashboard')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Customer Insert</h1>
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

                            <!-- Horizontal Form -->
                            <form action="{{ url('/customersStore') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" name="name"
                                        value="{{ old('name') }}" placeholder="Name">
                                    <label for="floatingText">Name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        id="floatingText" placeholder="Email">
                                    <label for="floatingText">Email</label>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="phone" id="floatingText" class="form-control"
                                        value="{{ old('phone') }}" placeholder="Phone">
                                    <label for="floatingText">Phone</label>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-3">
                                  <input type="text" name="driver_license_number" class="form-control" value="{{ old('driver_license_number') }}"
                                      id="floatingText" placeholder="Driver_License_Number">
                                  <label for="floatingText">Driver_License_Number</label>
                                  @error('driver_license_number')
                                      <p class="text-danger">{{ $message }}</p>
                                  @enderror
                                </div>

                                <div class="form-floating mb-3">
                                  <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                      id="floatingText" placeholder="Address">
                                  <label for="floatingText">Address</label>
                                  @error('address')
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
