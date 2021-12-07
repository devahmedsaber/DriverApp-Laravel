@extends('layouts.master')

@section('title', 'Edit Driver')

@section('pageHeaderTitle')
    <div class="col-lg-8">
        <div class="page-header-title">
            <i class="fa fa-list-ol bg-c-blue"></i>
            <div class="d-inline">
                <h5>Edit Driver</h5>
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
                <li class="breadcrumb-item">
                    <a href="{{ route('drivers.index') }}">Drivers</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('drivers.edit', $driver->id) }}">Edit Driver</a>
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
                    <h5>Edit Driver</h5>
                </div>
                <div class="card-body">
                    {!! Form::model($driver, ['method' => 'PUT', 'route' => ['drivers.update', $driver->id], 'files' => true]) !!}
                        @include('dashboard.drivers.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection
