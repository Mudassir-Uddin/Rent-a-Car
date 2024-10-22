@extends('layout.db_HF')
@section('mydashboard')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User Insert</h1>
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
                            <h5 class="card-title">User Form</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ url('/UsersStore') }}" method="POST" enctype="multipart/form-data">

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
                                    <input type="password" name="pass" id="floatingText" class="form-control"
                                        value="{{ old('pass') }}" placeholder="Password">
                                    <label for="floatingText">Password</label>
                                    @error('pass')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    {{-- {{session()->get('role')==2 ?  "Manager" : "Admin"  }} --}}
                                    @if (session()->has('role') && session('role') == 1)
                                        <label for="formFileLg" class="form-label">Role</label>
                                        <select name="role" id="" class="form-select mb-3">
                                            {{-- @foreach ($Service as $sr) --}}
                                            @if ($user->role == 1)
                                                <option value="1">---Admin---</option>
                                            @elseif ($user->role == 3)
                                                <option value="3">---Manager---</option>
                                            @else
                                                <option value="2">---User---</option>
                                            @endif

                                            <option value="1">Admin</option>
                                            <option value="3">Manager</option>
                                            <option value="2">User</option>


                                            {{-- @endforeach --}}
                                        </select>


                                        <label for="formFileLg" class="form-label">Status</label>
                                        <select name="status" id="" class="form-select mb-3">
                                            @if ($user->status == 1)
                                                {{-- @foreach ($Service as $sr) --}}
                                                <option value="1">---Active---</option>
                                            @else
                                                <option value="2">---Unactive---</option>
                                                {{-- @endforeach --}}
                                            @endif
                                            <option value="1">Active</option>
                                            <option value="2">Unactive</option>
                                        </select>
                                    @else
                                    @endif

                                </div>

                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Insert</button>
                            </form>

                            {{-- <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        First radio
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Second radio
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                      <label class="form-check-label" for="gridRadios3">
                        Third disabled radio
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <div class="col-sm-10 offset-sm-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Example checkbox
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End Horizontal Form --> --}}

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
