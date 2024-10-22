@extends('layout.db_HF')
@section('mydashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Customers Tables</h1>
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
                            <h5 class="card-title">Customer Table</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Driver_License</th>
                                        <th>Address</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                        {{-- @if (session()->get('role') == 1) --}}
                                            <th>Action</th>
                                        {{-- @else --}}
                                            <th></th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($customers as $ct)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>{{ $ct->name }}</td>

                                            <td><a href="{{ $ct->img }}" data-lightbox="roadtrip" class="data"><img
                                                        src="{{ $ct->img }}" width="80px" height="50px"
                                                        class="circle" alt=""></a></td>

                                            <td>{{ $ct->email }}</td>
                                            <td>{{ $ct->phone }}</td>
                                            <td>{{ $ct->driver_license_number}}</td>
                                            <td>{{ $ct->address}}</td>
                                            <td>{{ $ct->updated_at = date('Y-m-d') }}</td>
                                            {{-- @if (session()->get('role') == 3) --}}
                                                
                                            {{-- @elseif (session()->get('role') == 1) --}}
                                                <td>
                                                    <button class="btn btn-warning "><a class="text-white"
                                                            href="{{ url('/customersedit') }}/{{ $ct->id * 548548 }}">Edit</a></button>
                                                    <button onclick="myfun({{ $ct->id }})"
                                                        class="btn btn-danger">Delete</button>
                                                </td>
                                            {{-- @else --}}
                                                <td>
                                                    <a></a>
                                                    <a></a>
                                                </td>
                                            {{-- @endif --}}
                                        </tr>
                                    @endforeach
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
                    window.location.href = "{{ url('/customersdelete') }}/" + id
                }
            })
            // if (ans) {
            //     var ans = confirm("Do you want to delete ?")

            // }
        }
    </script>
@endsection
