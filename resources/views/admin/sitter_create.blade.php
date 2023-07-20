@extends('layouts.app')
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Sitters</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sitters</li>
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
                <div class="col-lg-12">
                    <div class="card-wrapper">

                        <div class="card">

                            <div class="card-header">
                                <h3 class="mb-0">Sitter</h3>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{route('admin.sitter_create')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Sitter Name" name="name"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Sitter Email address"
                                                        name="email" type="email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-map-marker"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Home Address"
                                                        name="address_home" type="text">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input class="form-control" name="phone_number_home"
                                                        placeholder="Personal Phone number" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control" placeholder="Password" name="password"
                                                        type="password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-merge">
                                                     <button class="btn btn-primary">Create</button>
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
        </div>
    </div>
@endsection
