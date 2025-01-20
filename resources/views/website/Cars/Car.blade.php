@extends('layout.webcar_HF')
@section('mycarwebsite')
    <!--featured-cars start -->
    <section id="featured-cars" class="featured-cars">
        <div class="container">
            <div class="section-header">
                <p>checkout <span>the</span> featured cars</p>
                <h2>featured cars</h2>
            </div><!--/.section-header-->

            <div class="row g-5 mb-5 text-center">
                <div class="col-lg-12">
                    <!-- Button for All Brands -->
                    <a href="{{ route('cars') }}" class="btn btn-primary {{ is_null($selectedBrandId) ? 'active' : '' }}">
                        All Brands
                    </a>

                    <!-- Buttons for Each Brand -->
                    @foreach ($brands as $brand)
                        <a href="{{ route('cars', ['brand' => $brand->id]) }}"
                            class="btn btn-primary {{ $selectedBrandId == $brand->id ? 'active' : '' }}">
                            {{ $brand->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="featured-cars-content">
                <div class="row">
                    @if ($cars->isEmpty())
                        <p class="alert alert-warning text-center mt-4">No cars available for this brand.</p>
                    @else
                        @foreach ($cars as $cr)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single-featured-cars">
                                    <div class="featured-img-box">
                                        <div class="featured-cars-img">
                                            <img src="{{ $cr->img }}" alt="cars">
                                        </div>
                                        <div class="featured-model-info">
                                            <p>
                                                model:{{ \Carbon\Carbon::createFromFormat('Y-m-d', $cr->date)->format('Y') }}
                                                <span class="featured-mi-span"> {{ $cr->brand->name }}</span>
                                                <span class="featured-hp-span">{{ $cr->color->name }}</span>
                                                {{ $cr->transmission__type->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="featured-cars-txt">
                                        <h2><a href="#">{{ $cr->models->name ?? 'Unknown Model' }}</a></h2>
                                        <h3>Rental Price : {{ $cr->daily_rate }}</h3>
                                        <p>
                                            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                            adipisci velit, sed quia non.
                                        </p>
                                        <a href="{{ url('/Booking') }}/{{ $cr->id }}">Booking</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    <ul class="pagination">
                        {{ $cars->links('pagination::bootstrap-4') }}
                    </ul>
                </div>

            </div>
        </div><!--/.container-->

    </section><!--/.featured-cars-->
    <!--featured-cars end -->
@endsection
