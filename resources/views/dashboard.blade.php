@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('pageHeaderTitle')
    <div class="col-lg-8">
        <div class="page-header-title">
            <i class="feather icon-home bg-c-blue"></i>
            <div class="d-inline">
                <h5>Dashboard</h5>
            </div>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="col-lg-4">
        <div class="page-header-breadcrumb">
            <ul class=" breadcrumb breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a> </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <a href="#">
                <div class="card prod-p-card card-red">
                    <div style="padding-bottom: 8px" class="card-body">
                        <div style="margin-bottom: 10px" class="row align-items-center m-b-30">
                            <div class="col arabic">
                                <h6 class="m-b-5 text-white">All Users</h6>
                                <h5 class="m-b-0 f-w-700 text-white">Total : {{ $allUsersTotal }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users text-c-red f-18"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="#">
                <div class="card prod-p-card card-blue">
                    <div style="padding-bottom: 8px" class="card-body">
                        <div style="margin-bottom: 10px" class="row align-items-center m-b-30">
                            <div class="col arabic">
                                <h6 class="m-b-5 text-white">Admins</h6>
                                <h5 class="m-b-0 f-w-700 text-white">Total : {{ $adminsTotal }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users text-c-blue f-18"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ route('drivers.index') }}">
                <div class="card prod-p-card card-yellow">
                    <div style="padding-bottom: 8px" class="card-body">
                        <div style="margin-bottom: 10px" class="row align-items-center m-b-30">
                            <div class="col arabic">
                                <h6 class="m-b-5 text-white">Drivers</h6>
                                <h5 class="m-b-0 f-w-700 text-white">Total : {{ $driversTotal }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users text-c-yellow f-18"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection

@section('scripts')

@endsection
