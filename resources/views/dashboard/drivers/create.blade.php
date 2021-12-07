@extends('layouts.master')

@section('title', 'New Driver')

@section('pageHeaderTitle')
    <div class="col-lg-6">
        <div class="page-header-title">
            <i class="fa fa-list-ol bg-c-blue"></i>
            <div class="d-inline">
                <h5>New Driver</h5>
            </div>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="col-lg-6">
        <div class="page-header-breadcrumb">
            <ul class=" breadcrumb breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('drivers.index') }}">Drivers</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('drivers.create') }}">New Driver</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card table-card">
                <div class="card-header">
                    <h5>New Driver</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => ('drivers.store'), 'files' => true]) !!}
                        @include('dashboard.drivers.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection
