@extends('layouts.app')
@section('content')
 
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Clients</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clients</li>
                            </ol>
                        </nav>
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
                                <th>Email</th>
                                <th>Home Address</th>
                                <th>Home Phone</th>
                                <th>Is Verified</th>
                                <th>Is Active</th>
                                <th>Account CreatedAt</th>
                                <th>Account Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr role="row">
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->address_home }}</td>
                                    <td>{{ $client->phone_number_home }}</td>
                                    <td>
                                        @if ($client->email_verified_at == null)
                                            <div class="badge badge-warning">Email not verified</div>
                                        @else
                                            <div class="badge badge-success">Email is verified</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($client->account_status == 0)
                                            <div class="badge badge-warning">Not Approved</div>
                                        @elseif($client->account_status == 1)
                                            <div class="badge badge-success">Approved</div>
                                        @elseif($client->account_status == 2)
                                            <div class="badge badge-danger">Suspended</div>
                                        @endif
                                    </td>
                                    <td>{{ $client->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($client->account_status == 0)
                                            <a href="{{route('admin.update_status',['status_type' =>'1', 'client_id' => $client->id])}}" class="btn btn-sm btn-success">Approve Account</a>
                                        @elseif($client->account_status == 1)
                                            <a href="{{route('admin.update_status',['status_type' =>'2', 'client_id' => $client->id])}}" class="btn btn-sm btn-danger">Suspend Account</a>
                                        @elseif($client->account_status == 2)
                                            <a href="{{route('admin.update_status',['status_type' =>'1', 'client_id' => $client->id])}}" class="btn btn-sm btn-primary">Activate Account</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 