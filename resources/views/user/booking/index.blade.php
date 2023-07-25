@extends('layouts.app')
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">User Booking</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('admin.pets_add') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus-circle mr-2"></i>Create New Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="table-responsive py-4">
                    <table id="datatable-buttons" class="table table-flush">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($pets as $pet) --}}
                                {{-- @php
                                    $client = App\Models\User::where('id', $pet->client_id)->first();
                                @endphp --}}
                                <tr role="row">
                                    <td>{{--  --}}</td>
                                    <td>{{--  --}}</td>
                                    <td>{{--  --}}</td>
                                    <td><a href=""
                                            class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                                            <a href=""
                                            class="btn btn-outline-primary"><i class="fa fa-pencil-alt"></i></a>
                                            <a href=""
                                            class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a></td>
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
