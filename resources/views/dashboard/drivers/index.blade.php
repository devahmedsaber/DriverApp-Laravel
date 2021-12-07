@extends('layouts.master')

@section('title', 'Drivers')

@section('css')

@endsection

@section('pageHeaderTitle')
    <div class="col-lg-8">
        <div class="page-header-title">
            <i class="fa fa-list-ol bg-c-blue"></i>
            <div class="d-inline">
                <h5>Drivers</h5>
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
                <li class="breadcrumb-item"><a href="{{ route('drivers.index') }}">Drivers</a> </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Drivers Table</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('drivers.create') }}" class="badge badge-primary px-3 py-2">New</a>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-striped table-bordered nowrap datatable text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Card ID</th>
                                <th>City</th>
                                <th>Transportation Type</th>
                                <th>Avatar Image</th>
                                <th>Card Image</th>
                                <th>Car Image</th>
                                <th>Transport Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($drivers as $driver)
                                <tr>
                                    <td>{{ $driver->id }}</td>
                                    <td>{{ $driver->firstname }}</td>
                                    <td>{{ $driver->lastname }}</td>
                                    <td>{{ $driver->email }}</td>
                                    <td>{{ $driver->phone }}</td>
                                    <td>{{ $driver->card_id }}</td>
                                    <td>{{ $driver->city }}</td>
                                    <td>{{ $driver->transportation_type }}</td>

                                    <td style="cursor: pointer;" data-toggle="modal" data-target="#avatar-{{ $driver->id }}">
                                        <i class="fa fa-eye"></i>
                                    </td>
                                    <!-- Driver Avatar Image Modal -->
                                    <div class="modal" tabindex="-1" role="dialog" id="avatar-{{ $driver->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Driver Avatar Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($driver->avatar_image)
                                                        <img src="{{ url('/') }}/public/assets/images/drivers/avatars/{{ $driver->avatar_image }}" alt="Avatar Photo" style="max-width: 100%;max-height: 100%">
                                                    @else
                                                        <p>No Photo</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td style="cursor: pointer;" data-toggle="modal" data-target="#card-{{ $driver->id }}">
                                        <i class="fa fa-eye"></i>
                                    </td>
                                    <!-- Driver Card Image Modal -->
                                    <div class="modal" tabindex="-1" role="dialog" id="card-{{ $driver->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Driver Card Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($driver->avatar_image)
                                                        <img src="{{ url('/') }}/public/assets/images/drivers/cards/{{ $driver->card_image }}" alt="Card Photo" style="max-width: 100%;max-height: 100%">
                                                    @else
                                                        <p>No Photo</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td style="cursor: pointer;" data-toggle="modal" data-target="#car-{{ $driver->id }}">
                                        <i class="fa fa-eye"></i>
                                    </td>
                                    <!-- Driver Car Image Modal -->
                                    <div class="modal" tabindex="-1" role="dialog" id="car-{{ $driver->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Driver Car Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($driver->car_image)
                                                        <img src="{{ url('/') }}/public/assets/images/drivers/cars/{{ $driver->car_image }}" alt="Car Photo" style="max-width: 100%;max-height: 100%">
                                                    @else
                                                        <p>No Photo</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td style="cursor: pointer;" data-toggle="modal" data-target="#transport-{{ $driver->id }}">
                                        <i class="fa fa-eye"></i>
                                    </td>
                                    <!-- Driver Transport Image Modal -->
                                    <div class="modal" tabindex="-1" role="dialog" id="transport-{{ $driver->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Driver Transport Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($driver->transport_image)
                                                        <img src="{{ url('/') }}/public/assets/images/drivers/transports/{{ $driver->transport_image }}" alt="Transport Photo" style="max-width: 100%;max-height: 100%">
                                                    @else
                                                        <p>No Photo</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td>
                                        <a type="button" href="{{ route('drivers.edit', $driver->id) }}"
                                           style="padding: 3px;width: 30px; " class="btn btn-primary btn-round" title="Edit Driver"><i
                                                style="margin-right: 0" class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST"
                                              style="display: inline" title="Delete Driver">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class=" btn btn-danger btn-round" type="submit"
                                                    style="padding: 3px;width: 30px;"
                                                    onclick="return confirm('Do You Want To Delete This Driver ?');">
                                                <i style="margin-right: 0" class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection
