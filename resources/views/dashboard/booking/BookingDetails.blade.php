@extends('layout.db_HF')
@section('mydashboard')

<main id="main" class="main">

        <div class="pagetitle">
            <h1>Booking_Details Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admindashboard">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Booking_Details Table</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Img</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Status</th>
                                        @if ($role == 1)
                                            <th scope="col">Confirmation</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 0;
                                @endphp
                                    @foreach ($appoin as $item)
                                    <tr>
                                        <th scope="row">{{ ++$count }}</th>
                                        <th>
                                            {{-- <a href="{{$item->rentals->img}}" data-lightbox="roadtrip" class="data"><img src="{{$item->rentals->img}}" width="50px" height="50px" alt=""></a> --}}
                                            <img src="{{$item->rentals->cars->img}}" width="50px" height="50px" alt="">
                                        </th>
                                        <td>{{$item->rentals->cars->Model}}</td>
                                        {{-- <td><img src="{{$item[0]->img}}" alt=""></td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        @php
                                            $statusMsg = 'pending';
                                            if ($item->booking_status == 1) {
                                                $statusMsg = 'Pending';
                                            } elseif ($item->booking_status == 2) {
                                                $statusMsg = 'Done';
                                            } elseif ($item->booking_status == 3) {
                                                $statusMsg = 'canceled';
                                            } else {
                                                $statusMsg = '-----';
                                            }
                                        @endphp
                                        <td>{{ $statusMsg }}</td>
                                        @if ($role == 1)
                                            <td>
                                                <form method="POST"
                                                    action="{{ url('/BookingConfirm') }}/{{ $item->id }}"
                                                    class="myForm">
                                                    @csrf
                                                    <select name="confirmValue" class="form-control myDropdown">
                                                        <option value="1"
                                                            {{ $item->booking_status == 1 ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="2"
                                                            {{ $item->booking_status == 2 ? 'selected' : '' }}>
                                                            Done</option>
                                                        <option value="3"
                                                            {{ $item->booking_status == 3 ? 'selected' : '' }}>
                                                            Cancelled</option>
                                                    </select>
                                                </form>
    
                                            </td>
                                        @endif
    
                                    </tr>
                                    @endforeach

                                    <script>
                                        const dropdowns = document.querySelectorAll(".myDropdown");
        
                                        dropdowns.forEach(dropdown => {
                                            dropdown.addEventListener("change", function() {
                                                this.closest(".myForm").submit();
                                            });
                                        });
                                    </script>
        
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <script>
        function myfun(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'

                    )
                    window.location.href = "{{ url('/Booking_Detailsdelete') }}/" + id
                }
            })
            // if (ans) {
            //     var ans = confirm("Do you want to delete ?")

            // }
        }
    </script>
@endsection
