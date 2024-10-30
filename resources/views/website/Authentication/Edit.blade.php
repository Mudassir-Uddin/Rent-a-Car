@extends('layout.form')
@section('myform')
    

    <div class="container-fluid position-relative d-flex p-0">

        <!-- Login Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-around mb-3">
                            <a href="index.html" class="">
                                <h3  style="color:#6aaff0;"><i class="fa fa-user-edit me-2"></i>Tech Giants</h3>
                            </a>
                            <h3>Profile Edit</h3>
                        </div>
                        <form  action="{{ url('/passupdate') }}/{{ $user->id }}" method="POST" enctype="multipart/form-data"
                            id="formSubmit">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="floatingText" value="{{ $user->name }}"
                                    class="form-control" placeholder="name">
                                <label for="floatingText">Name</label>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="password" id="floatingText"  value="{{ old('password') }}"
                                    class="form-control" placeholder="jhondoe">
                                <label for="floatingText">Change password</label>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button style="background-color:#6aaff0; border-color:#6aaff0;" class="btn btn-primary py-3 w-100 mb-4" type="submit">Update</button>
                            <a href="/"  style="color:#6aaff0;">Back To Home :)</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
    </div>

@endsection
