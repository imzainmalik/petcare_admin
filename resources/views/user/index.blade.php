@extends('layouts.app')
@section('content')
    <style>
        .hide {
            display: none;
        }
    </style>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
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
                    <div class="col-xl-3 col-md-6">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
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
                                            <sup class="text-white">$</sup> <span
                                                class="h2 text-white">{{ $service->price }}.00</span>
                                            <div class="text-light mt-2 text-sm">{{ $service->name }}</div>
                                        </div>
                                        <button class="btn btn-sm btn-block btn-neutral" type="button" data-toggle="modal"
                                            data-target="#exampleModal_{{ $service->id }}">Book now</button>
                                    </div>
                                    <div class="card-body" style="height: 200px; overflow: scroll;">
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
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $service->name }}</h5>
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

                                                                    <small class="text-white font-weight-bold mr-3">Save
                                                                        for
                                                                        auto charge</small>
                                                                    <div>
                                                                        <label class="">
                                                                            <select name="auto_charge_option"
                                                                                class="form-control"
                                                                                style="width: 100px;">
                                                                                <option value="0 Don't make auto charge">
                                                                                    Don't make auto charge</option>
                                                                                <option value="1">Auto charge</option>
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
                                                                        placeholder="Name on card" value="testing name"
                                                                        name="name_card" type="text">
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
                                                                        <div class="input-group input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="ni ni-lock-circle-open"></i>
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
                                                                                    name="end_date" placeholder="End date"
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
    </div>
@endsection
