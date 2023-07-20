@extends('layouts.app')
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Pets</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pets</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('admin.pets_add') }}" class="btn btn-sm btn-primary">Create New Pet</a>
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
                                <th>Pet Name</th>
                                <th>Pet Owner</th>
                                <th>CreatedAt</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pets as $pet)
                                @php
                                    $client = App\Models\User::where('id', $pet->client_id)->first();
                                @endphp
                                <tr role="row">
                                    <td>{{ $pet->pet_name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $pet->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('admin.remove_pet', ['pet_id' => $pet->id]) }}"
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
