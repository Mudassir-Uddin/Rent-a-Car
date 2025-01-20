@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>car Insert</h1>
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
                            {{-- <form method="POST" action="{{ route('carsStore') }}" enctype="multipart/form-data">
                                @csrf
                                <label for="brand">Select Brand:</label>
                                <select id="brand" name="brand_id">
                                    <option value="">Select Brand</option>
                                    @foreach ($BrandId as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            
                                <label for="model">Select Model:</label>
                                <select id="model" name="model_id">
                                    <option value="">Select Model</option>
                                </select>
                            
                                <label for="color">Select Color:</label>
                                <select id="color" name="color_id">
                                    <option value="">Select Color</option>
                                    @foreach ($ColorId as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            
                                <label for="transmission">Select Transmission:</label>
                                <select id="transmission" name="transmission_id">
                                    <option value="">Select Transmission</option>
                                    @foreach ($TransmissionId as $transmission)
                                        <option value="{{ $transmission->id }}">{{ $transmission->name }}</option>
                                    @endforeach
                                </select>
                            
                                <label for="img">Upload Image:</label>
                                <input type="file" id="img" name="img">
                            
                                <label for="date">Date:</label>
                                <input type="date" id="date" name="date">
                            
                                <label for="daily_rate">Daily Rate:</label>
                                <input type="text" id="daily_rate" name="daily_rate">
                            
                                <button type="submit">Submit</button>
                            </form> --}}

                            <form method="POST" action="{{ route('carsStore') }}" enctype="multipart/form-data" class="p-4">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="brand" class="form-label">Select Brand:</label>
                                    <select id="brand" name="brand_id" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($BrandId as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                @error('brand_id')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                                </div>
                            
                                <div class="form-group mb-3">
                                    <label for="model" class="form-label">Select Model:</label>
                                    <select id="model" name="model_id" class="form-control">
                                        <option value="">Select Model</option>
                                    </select>
                                    
                                @error('model_id')
                                        <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            
                                <div class="form-group mb-3">
                                    <label for="img" class="form-label">Upload Image:</label>
                                    <input type="file" id="img" name="img" class="form-control">
                                    
                                @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="date" class="form-label">Date:</label>
                                    <input type="date" id="date" name="date" class="form-control">
                                    
                                @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="registration_number" class="form-label">registration_number:</label>
                                    <input type="registration_number" id="registration_number" name="registration_number" class="form-control">
                                    
                                @error('registration_number')
                                        <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                

                                <div class="form-group mb-3">
                                    <label for="color" class="form-label">Select Color:</label>
                                    <select id="color" name="color_id" class="form-control">
                                        <option value="">Select Color</option>
                                        @foreach ($ColorId as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('color_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="transmission_id" class="form-label">Select transmission_id:</label>
                                    <select id="transmission_id" name="transmission_id" class="form-control">
                                        <option value="">Select transmission_id</option>
                                        @foreach ($TransmissionId as $transmission_id)
                                            <option value="{{ $transmission_id->id }}">{{ $transmission_id->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                @error('transmission_id')
                                        <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            
                                <div class="form-group mb-3">
                                    <label for="daily_rate" class="form-label">Daily Rate:</label>
                                    <input type="text" id="daily_rate" name="daily_rate" class="form-control">
                                    
                                @error('daily_rate')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                                </div>
                            
                                <div class="form-group mb-3">
                                    
                                <label for="formFileLg" class="form-label">Status</label>
                                <select name="status" id="" class="form-select mb-3">
                                    <option value="0" selected disabled>Select Status</option>
                                    <option value="1">Available</option>
                                    <option value="2">Rented</option>
                                    <option value="3">Maintenance</option>
                                    <option value="4">Reserved</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#brand').on('change', function () {
                const brandId = $(this).val();
                $('#model').html('<option value="">Select Model</option>'); // Clear previous models
    
                if (brandId) {
                    $.ajax({
                        url: '/Dbmodels/' + brandId,
                        type: 'GET',
                        success: function (models) {
                            models.forEach(function (model) {
                                $('#model').append(`<option value="${model.id}">${model.name}</option>`);
                            });
                        },
                        error: function () {
                            alert('Failed to fetch models. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
    
{{-- <script>
    $(document).ready(function () {
        $('#brand').on('change', function () {
            const brandId = $(this).val();
            $('#model').html('<option value="">Select Model</option>'); // Clear previous models

            if (brandId) {
                $.ajax({
                    url: '/Dbmodels/' + brandId, // Correct route for fetching models
                    type: 'GET',
                    success: function (models) {
                        models.forEach(function (model) {
                            $('#model').append(`<option value="${model.id}">${model.name}</option>`);
                        });
                    },
                    error: function () {
                        alert('Failed to fetch models. Please try again.');
                    }
                });
            }
        });
    });
</script> --}}
  

    
@endsection
