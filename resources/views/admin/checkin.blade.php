@extends('layouts.main')


@section('page-content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Modul Checkin</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>                               
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->code }}</td>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->phone }}</td>
                                <td>{{ $ticket->type }}</td>
                                <td>@currency($ticket->price)</td>
                                <td>{{ $ticket->status }}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            
                                            {{-- <a href="/checkin/{{ $ticket->id }}" class="btn-sm btn-success waves-effect waves-light"><i class="bx bx-check font-size-14"></i> | Check In</a> --}}
                                            
                                            <form action="/checkin/{{ $ticket->id }}" method="POST" class="d-inline">
                                                @method('put')
                                                @csrf
                                                <button class="btn-sm btn-success waves-effect waves-light">
                                                    <i class="bx bx-check font-size-14"></i> | Check In
                                                </button>
                                            </form>

                                        </li>
                                        
                                    </ul>
                                </td>
                            </tr>    
                            @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>

@endsection