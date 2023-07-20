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
                                <li class="breadcrumb-item" aria-current="page">Pets</li>
                                <li class="breadcrumb-item active" aria-current="page"> Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt--6">
        <div class="col-lg-6">
            <div class="card-wrapper">

                <div class="card">

                    <div class="card-header">
                        <h3 class="mb-0">Pet informartion</h3>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('admin.pet_create')}}"> 
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Pet name" name="pet_name" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <select name="client_id" id="" class="form-control" required>
                                                <option value="">Select Pet Owner</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->name}} - {{$client->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
@endsection
