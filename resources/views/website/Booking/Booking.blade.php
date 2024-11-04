@extends('layout.form')
@section('myform')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <div class="container-fluid position-relative d-flex p-0">

        <!-- User insert Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-10 col-md-7 col-lg-7 col-xl-7">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-around mb-3">
                            <a href="index.html">
                                <h3 style="color:#ffffff;"><i class="fa fa-user-edit me-2"></i>Order Details</h3>
                            </a>
                        </div>
                        <form action="{{ url('BookingPost/')}}/{{$productId}}" method="POST" enctype="multipart/form-data"
                            id="loginForm">

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
                                <input type="number" name="phone" class="form-control" value="{{ old('phone') }}"
                                    id="floatingText" placeholder="Phone">
                                <label for="floatingText">Phone</label>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="address" rows="5" class="form-control" value="{{ old('address') }}" id="floatingText"
                                    placeholder="Address"></textarea>
                                <label for="floatingText">Address</label>

                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <script>
                                flatpickr("#meetDate", {
                                    enableTime: false, // Change to true if you want to include time
                                    dateFormat: "Y-m-d", // Change the format as needed
                                    // Additional configuration options can be added here
                                });
                            </script> --}}

                            <button type="submit" style="background-color:#ffffff; border-color:#ffffff; color:black;"
                                class="btn btn-primary py-3 w-100 mb-4 fs-5 mt-4">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- User insert End -->
    </div>
@endsection
