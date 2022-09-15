@extends('layouts.main')


@section('page-content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Laporan Rental Mobil</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>                               
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Status</th>                              
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ticket->code }}</td>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->phone }}</td>
                                <td>{{ $ticket->type }}</td>
                                <td>@currency($ticket->price)</td>
                                <td>{{ $ticket->status }}</td>       
                            </tr>
                            @endforeach

                            </tbody>
                        
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div> <!-- container-fluid -->
</div>

@endsection