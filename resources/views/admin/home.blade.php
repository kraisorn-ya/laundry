@extends('admin.layouts.main_dashboard')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <label>สวัสดีคุณ :</label>
                        {{ Auth::user()->first_name." ".Auth::user()->last_name }}<br>
                    </div>
                </div>
            </div>
            {{--            <div class="container" style="margin-top: 2%">--}}
            {{--                <div class="row">--}}
            {{--                        <div class="card-admin mb-3">--}}
            {{--                            <div class="row ">--}}
            {{--                                <div class="col-md-3">--}}
            {{--                                    <img src="{{ asset('img/users.png') }}" class="card-img" alt="...">--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8">--}}
            {{--                                    <div class="card-body">--}}
            {{--                                        <h5 class="card-title">Member</h5>--}}
            {{--                                        <p class="card-text">20</p>--}}
            {{--                                        <p class="card-text">--}}
            {{--                                            <small class="text-muted">Last updated 3 mins ago</small>--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="card mb-3" style="max-width: 540px;">--}}
            {{--                            <div class="row">--}}
            {{--                                <div class="col-md-4">--}}
            {{--                                    <img src="{{ asset('img/order.png') }}" class="card-img" alt="...">--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8">--}}
            {{--                                    <div class="card-body">--}}
            {{--                                        <h5 class="card-title">Order</h5>--}}
            {{--                                        <p class="card-text">20</p>--}}
            {{--                                        <p class="card-text">--}}
            {{--                                            <small class="text-muted">Last updated 3 mins ago</small>--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="card mb-3" style="max-width: 540px;">--}}
            {{--                            <div class="row ">--}}
            {{--                                <div class="col-md-4">--}}
            {{--                                    <img src="{{ asset('img/sales.png') }}" class="card-img" alt="...">--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8">--}}
            {{--                                    <div class="card-body">--}}
            {{--                                        <h5 class="card-title">Sales</h5>--}}
            {{--                                        <p class="card-text">500</p>--}}
            {{--                                        <p class="card-text">--}}
            {{--                                            <small class="text-muted">Last updated 3 mins ago</small>--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
        <div class="row" style="margin-top: 1%">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings
                                    (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings
                                    (Annual)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending
                                    Requests
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($users) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
