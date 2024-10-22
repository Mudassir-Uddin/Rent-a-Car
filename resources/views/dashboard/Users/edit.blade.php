@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User Edit</h1>
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
                            <form action="{{ url('/Usersupdate') }}/{{ $user->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" value="{{ $user->name }}"
                                        name="name" placeholder="jhondoe">
                                    <label for="floatingText">username</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">User Image</label>
                                    <input class="form-control  form-control " name="img" id="formFileLg"
                                        type="file">
                                    @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <br>
                                    @if ($user->img != null)
                                        Old Image : <img src="{{ url($user->img) }}" class="img-fluid rounded"
                                            width="80px" height="50px" />
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" value="{{ $user->email }}"
                                        name="email" placeholder="jhondoe">
                                    <label for="floatingText">email</label>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- <div class="form-floating mb-3">
                                  <input type="TEXT" class="form-control" id="floatingText" id="password" 
                                      name="password" placeholder="jhondoe">
                                  <label for="floatingText">Change password</label>
                                  @error('password')
                                      <p class="text-danger">{{ $message }}</p>
                                  @enderror
                              </div> --}}

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
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">eidt</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
