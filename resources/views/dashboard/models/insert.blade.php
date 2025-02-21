@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Models Insert</h1>
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
                            <h5 class="card-title">Models Form</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ url('/modelsStore') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        id="floatingText" placeholder="name">
                                    <label for="floatingText">name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <select name="brand_id" id="" class="form-select mb-3">
                                    {{-- <option value="0" selected disabled>Select Brand</option> --}}
                                    @foreach ($BrandId as $sr)
                                    {{-- @if ($rental == $rentals->rental_date || $rentals->return_date) --}}
                                    {{-- <option disabled value="{{ $sr->id }}">{{ $sr->registration_number }}</option> --}}
                                    {{-- @else --}}
                                    <option value="{{ $sr->id }}">{{ $sr->name }}</option>
                                    {{-- @endif --}}
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Insert</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
