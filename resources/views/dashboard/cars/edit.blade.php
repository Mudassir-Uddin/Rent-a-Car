@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>car Edit</h1>
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
                            <form action="{{ url('/carsupdate') }}/{{ $car->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <select name="brand_id" id="" class="form-select mb-3">
                                        @foreach ($BrandId as $ct)
                                            {{-- <option value="0">Select SubServices</option> --}}
                                            @if ($ct->id == $ct->brand_id)
                                                <option value="{{$ct->id}}" selected>{{$ct->name}}</option>
                                            @else
                                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="Model" id="" class="form-select mb-3">
                                        @foreach ($ModelId as $ct)
                                            {{-- <option value="0">Select SubServices</option> --}}
                                            @if ($ct->id == $ct->model_id)
                                                <option value="{{$ct->id}}" selected>{{$ct->name}}</option>
                                            @else
                                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">car Image</label>
                                    <input class="form-control  form-control " name="img" id="formFileLg"
                                        type="file">
                                    @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <br>
                                    @if ($car->img != null)
                                        Old Image : <img src="{{ url($car->img) }}" class="img-fluid rounded" width="80px"
                                            height="50px" />
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingText" value="{{ $car->date }}"
                                        name="date" placeholder="jhondoe">
                                    <label for="floatingText">date</label>
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText"
                                        value="{{ $car->registration_number }}" name="registration_number"
                                        placeholder="registration_number">
                                    <label for="floatingText">registration_number</label>
                                    @error('registration_number')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="color_id" id="" class="form-select mb-3">
                                        @foreach ($ColorId as $ct)
                                            {{-- <option value="0">Select SubServices</option> --}}
                                            @if ($ct->id == $ct->color_id)
                                                <option value="{{$ct->id}}" selected>{{$ct->name}}</option>
                                            @else
                                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <select name="transmission_id" id="" class="form-select mb-3">
                                        @foreach ($TransmissionId as $ct)
                                            {{-- <option value="0">Select SubServices</option> --}}
                                            @if ($ct->id == $ct->transmission_id)
                                                <option value="{{$ct->id}}" selected>{{$ct->name}}</option>
                                            @else
                                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingText"
                                        value="{{ $car->daily_rate }}" name="daily_rate" placeholder="daily_rate">
                                    <label for="floatingText">daily_rate</label>
                                    @error('daily_rate')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <label for="formFileLg" class="form-label">Status</label>
                                <select name="status" id="" class="form-select mb-3">
                                    @if ($car->status == 1)
                                        {{-- @foreach ($Service as $sr) --}}
                                        <option value="1">---Available---</option>
                                    @elseif ($car->status == 2)
                                        <option value="2">---Ranted---</option>
                                        {{-- @endforeach --}}
                                    @else
                                        <option value="3">---Under Maintenance---</option>
                                    @endif
                                    <option value="1">Available</option>
                                    <option value="2">Ranted</option>
                                    <option value="3">Under Maintenance</option>
                                </select>

                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">eidt</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
