<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('firstname', 'Firstname :') !!} <span class="text-danger">*</span>
        {!! Form::text('firstname', old('firstname'), ['id' => 'firstname', 'class' =>
        'form-control','placeholder' => 'Firstname', 'required']) !!}
        <span><small class="text-danger">{{ $errors->first('firstname') }}</small></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('lastname', 'Lastname :') !!} <span class="text-danger">*</span>
        {!! Form::text('lastname', old('lastname'), ['id' => 'lastname', 'class' =>
        'form-control','placeholder' => 'Lastname', 'required']) !!}
        <span><small class="text-danger">{{ $errors->first('lastname') }}</small></span>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('email', 'Email :') !!} <span class="text-danger">*</span>
        {!! Form::text('email', old('email'), ['id' => 'email', 'class' =>
        'form-control','placeholder' => 'Email', 'required']) !!}
        <span><small class="text-danger">{{ $errors->first('email') }}</small></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('password', 'Password :') !!} <span class="text-danger">*</span>
        {!! Form::password('password', ['id' => 'password', 'class' =>
        'form-control','placeholder' => 'Password']) !!}
        <span><small class="text-danger">{{ $errors->first('password') }}</small></span>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('phone', 'Phone :') !!} <span class="text-danger">*</span>
        {!! Form::text('phone', old('phone'), ['id' => 'phone', 'class' =>
        'form-control','placeholder' => 'Phone', 'required']) !!}
        <span><small class="text-danger">{{ $errors->first('phone') }}</small></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('card_id', 'Card ID :') !!} <span class="text-danger">*</span>
        {!! Form::text('card_id', old('card_id'), ['id' => 'card_id', 'class' =>
        'form-control','placeholder' => 'Card ID', 'required']) !!}
        <span><small class="text-danger">{{ $errors->first('card_id') }}</small></span>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('city', 'City :') !!} <span class="text-danger">*</span>
        {!! Form::text('city', old('city'), ['id' => 'city', 'class' =>
        'form-control','placeholder' => 'City', 'required']) !!}
        <span><small class="text-danger">{{ $errors->first('city') }}</small></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('transportation_type', 'Transportation Type :') !!} <span class="text-danger">*</span>
        {!! Form::text('transportation_type', old('transportation_type'), ['id' => 'transportation_type', 'class' =>
        'form-control','placeholder' => 'Transportation Type', 'required']) !!}
        <span><small class="text-danger">{{ $errors->first('transportation_type') }}</small></span>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('avatar_image', 'Avatar Image :') !!}
        {!! Form::file('avatar_image', ['id' => 'avatar_image', 'class' => 'form-control']) !!}
        <span><small class="text-danger">{{ $errors->first('avatar_image') }}</small></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('card_image', 'Card Image :') !!}
        {!! Form::file('card_image', ['id' => 'card_image', 'class' => 'form-control']) !!}
        <span><small class="text-danger">{{ $errors->first('card_image') }}</small></span>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('car_image', 'Car Image :') !!}
        {!! Form::file('car_image', ['id' => 'car_image', 'class' => 'form-control']) !!}
        <span><small class="text-danger">{{ $errors->first('car_image') }}</small></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('transport_image', 'Transport Image :') !!}
        {!! Form::file('transport_image', ['id' => 'transport_image', 'class' => 'form-control']) !!}
        <span><small class="text-danger">{{ $errors->first('transport_image') }}</small></span>
    </div>
</div>

@if(isset($driver))
    {!! Form::hidden('id', $driver->id) !!}
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
@else
    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
@endif
