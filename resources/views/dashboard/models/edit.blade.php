@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Models Edit</h1>
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
                            <h5 class="card-title">model Form</h5>
                            <form action="{{ url('/modelsupdate') }}/{{ $model->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" value="{{ $model->name }}"
                                        name="name" placeholder="jhondoe">
                                    <label for="floatingText">name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
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

                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">eidt</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
