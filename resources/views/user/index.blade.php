@extends('layouts.app')
@section('content')
    <style>
        .hide {
            display: none;
        }
    </style>

    <div class="header bg-primary pb-6">
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            {{-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> --}}
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                    {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
                                </ol>
                            </nav>
                        </div>
                        {{-- <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">New</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Bookings</h5>
                                            <span class="h2 font-weight-bold mb-0">350</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-active-40"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">total services</h5>
                                            <span class="h2 font-weight-bold mb-0">2,356</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-chart-pie-35"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total amount spend</h5>
                                            <span class="h2 font-weight-bold mb-0">$ 924</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="ni ni-money-coins"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                            <span class="h2 font-weight-bold mb-0">49,65%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            Services
                        </div>
                        <div class="card-body">
                            <div class="card-deck">
                                @foreach ($services as $service)
                                    <div class="card bg-gradient-default">
                                        <div class="card-body">
                                            <div class="mb-2">
                                                {{-- <sup class="text-white">$</sup>  --}}
                                                <span
                                                    class="h2 text-white">$ {{ $service->price }}.00</span>
                                                <div class="text-light mt-2 text-sm">{{ $service->name }}</div>
                                            </div>
                                            <button class="btn btn-sm btn-block btn-neutral" type="button"
                                                data-toggle="modal" data-target="#exampleModal_{{ $service->id }}">Book
                                                now</button>
                                        </div>
                                        <div class="card-body" style="height: auto; overflow: hidden;">
                                            <div class="row">
                                                <div class="col">
                                                    {{ $service->description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $service->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $service->name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('user.booking_payment', ['service_id' => $service->id]) }}"
                                                    method="post" class="require-validation" data-cc-on-file="false"
                                                    data-stripe-publishable-key="pk_test_51MgDrRGrh32uccZtkyzrAYGQilbt8q4S1VVvfZRanCNhE2J8stJwul7zHZNAz8loHKVmzhDzJeOavaXZecRnupLP00XEj7C30c"
                                                    id="payment-form">
                                                    @csrf
                                                    <div class="modal-body bg-gradient-primary">
                                                        <div class="card-body">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col">
                                                                    <img src="{{ asset('assets/img/icons/cards/mastercard.png') }}"
                                                                        alt="Image placeholder"style="height: 37px;">
                                                                    <img src="{{ asset('assets/img/icons/cards/visa-png.webp') }}"
                                                                        alt="Image placeholder" style="height: 37px;">
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="d-flex align-items-center">

                                                                        <small
                                                                            class="text-white font-weight-bold mr-3">Save
                                                                            for
                                                                            auto charge</small>
                                                                        <div>
                                                                            <label class="form-control-label" for="exampleFormControlSelect1">
                                                                                <select name="auto_charge_option"
                                                                                    class="form-control"
                                                                                    style="width: 100px;" id="exampleFormControlSelect1">
                                                                                    {{-- <option value="" selected>please select</option> --}}
                                                                                    <option value="1">
                                                                                        Auto charge</option>
                                                                                    <option value="0">
                                                                                        Don't make auto charge</option>
                                                                                    
                                                                                </select>
                                                                                {{-- <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span> --}}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-alternative mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="ni ni-single-02"></i></span>
                                                                        </div>
                                                                        <input class="form-control required"
                                                                            placeholder="Name on card"
                                                                            value="testing name" name="name_card"
                                                                            type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-alternative mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="ni ni-credit-card"></i></span>
                                                                        </div>
                                                                        <input class="form-control required"
                                                                            placeholder="Card number" id="card_number"
                                                                            value="4242424242424242" name="card_number"
                                                                            type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="input-group input-group-alternative mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="ni ni-calendar-grid-58"></i></span>
                                                                                </div>
                                                                                <input class="form-control required"
                                                                                    placeholder="MM" id="exp_month"
                                                                                    value="06" name="exp_month"
                                                                                    type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="input-group input-group-alternative mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="ni ni-calendar-grid-58"></i></span>
                                                                                </div>
                                                                                <input class="form-control required"
                                                                                    placeholder="YY" id="exp_year"
                                                                                    value="2029" name="exp_year"
                                                                                    type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="input-group input-group-alternative">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">
                                                                                        <i
                                                                                            class="ni ni-lock-circle-open"></i>
                                                                                    </span>
                                                                                </div>
                                                                                <input class="form-control required"
                                                                                    placeholder="CCV" id="cvc"
                                                                                    value="233" name="cvc"
                                                                                    type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div
                                                                        class="input-daterange datepicker row align-items-center">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i
                                                                                                class="ni ni-calendar-grid-58"></i></span>
                                                                                    </div>
                                                                                    <input class="form-control"
                                                                                        name="start_date"
                                                                                        placeholder="Start date"
                                                                                        type="text" value="06/18/2023">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i
                                                                                                class="ni ni-calendar-grid-58"></i></span>
                                                                                    </div>
                                                                                    <input class="form-control"
                                                                                        name="end_date"
                                                                                        placeholder="End date"
                                                                                        type="text" value="06/22/2023">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='form-row row'>
                                                                    <div class='col-md-12 error form-group hide'>
                                                                        <div class='alert-danger alert'>
                                                                            Please correct the errors and try again.
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button type="submit" class="btn btn-block btn-info">
                                                                    Save new card
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card-deck flex-column flex-xl-row">

                <div class="card">

                    <div class="card-header">

                        <h5 class="h3 mb-0">Team members</h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush list my--3">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-1.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">John Michael</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>Online</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-2.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Alex Smith</a>
                                        </h4>
                                        <span class="text-warning">●</span>
                                        <small>In a meeting</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-3.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Samantha Ivy</a>
                                        </h4>
                                        <span class="text-danger">●</span>
                                        <small>Offline</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">John Michael</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>Online</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">

                        <h5 class="h3 mb-0">To do list</h5>
                    </div>

                    <div class="card-body p-0">

                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-success checklist-item-checked">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Call with Dave</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-success">
                                            <input class="custom-control-input" id="chk-todo-task-1" type="checkbox"
                                                checked="">
                                            <label class="custom-control-label" for="chk-todo-task-1"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-warning">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Lunch meeting</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-warning">
                                            <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
                                            <label class="custom-control-label" for="chk-todo-task-2"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-info">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Argon Dashboard Launch</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-info">
                                            <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                                            <label class="custom-control-label" for="chk-todo-task-3"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-danger checklist-item-checked">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Winter Hackaton</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-danger">
                                            <input class="custom-control-input" id="chk-todo-task-4" type="checkbox"
                                                checked="">
                                            <label class="custom-control-label" for="chk-todo-task-4"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">

                        <h5 class="h3 mb-0">Progress track</h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush list my--3">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/bootstrap.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>Argon Design System</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/angular.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>Angular Now UI Kit PRO</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/sketch.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>Black Dashboard</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-red" role="progressbar" aria-valuenow="72"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../../assets/img/theme/react.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>React Material Dashboard</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            © 2021 <a href="https://www.creative-tim.com/" class="font-weight-bold ml-1"
                                target="_blank">Creative Tim</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link"
                                    target="_blank">About
                                    Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com/" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer> --}}
        </div>
        {{-- <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">User Booking</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
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
                                <th>Pet Name</th>
                                <th>Pet Owner</th>
                                <th>CreatedAt</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($pets as $pet) --}}
        {{-- @php
                                    $client = App\Models\User::where('id', $pet->client_id)->first();
                                @endphp --}}
        {{-- <tr role="row">
            <td></td>
            <td></td>
            <td></td>
            <td><a href="" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                <a href="" class="btn btn-outline-primary"><i class="fa fa-pencil-alt"></i></a>
                <a href="" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
            </td>
        </tr> --}}
        {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
    </div>
    </div>
    </div> --}}
@endsection
