@extends('layouts.app')
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">New Pet type</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New Pet type</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('admin.category_create') }}" class="btn btn-sm btn-primary">Create New Pet
                            type</a>
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
                                <th>CreatedAt</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                {{-- {{dd($category)}} --}}
                                <tr role="row">
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        {{ $category->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        @if ($category->is_acitve == 1)
                                            <a href="{{ route('admin.change_status', ['type_id' => $category->id, 'status_type' => 0]) }}"
                                                class="btn btn-danger">Remove</a>
                                        @else
                                            <a href="{{ route('admin.change_status', ['type_id' => $category->id, 'status_type' => 1]) }}"
                                                class="btn btn-success">Activate</a>
                                        @endif

                                        <button data-toggle="modal" data-target="#exampleModal_{{ $category->id }}"
                                            class="btn btn-primary">Edit</button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('admin.categpry_update', ['type_id' => $category->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                for="example3cols1Input">Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                                required id="example3cols1Input"
                                                                placeholder="Pet type name">
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
