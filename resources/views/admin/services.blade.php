@extends('layouts.app')
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Services</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('admin.create_services') }}" class="btn btn-sm btn-primary">Create New
                            Services</a>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Service Type</th>
                                <th>Price</th>
                                <th>CreatedAt</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service) 
                                <tr role="row">
                                    <td>{{ $service->name }}</td>
                                    <td>{{ substr($service->description, 0 ,80) }}</td>
                                    <td>
                                        @if($service->service_for_day_hour == 0)
                                            <div class="badge badge-primary">Hourly</div>
                                        @else 
                                        <div class="badge badge-primary">Day</div>
                                        @endif 
                                    </td>
                                    <td>${{$service->price}}.00</td>
                                    <td>{{ $service->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('admin.destroy_service', ['service_id' => $service->id]) }}"
                                            class="btn btn-danger">Remove</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
