@extends('layouts.app')
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Create Services</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt--6">
        <div class="card mb-4">

            <div class="card-header">
                <h3 class="mb-0">Create Service</h3>
            </div>

            <div class="card-body">
                <form action="{{route('admin.service_store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Name</label>
                                <input type="text" name="name" class="form-control" id="example3cols1Input"
                                    placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="example4cols1Input">Description</label>
                                <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                             <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
