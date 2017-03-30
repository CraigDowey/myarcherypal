@extends('layouts.admin')


@section('content')
    <h1>Edit User</h1>

    <div class="row">
        @include('include.form-errors')
    </div>

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$user->photo ? URL::to($user->photo->file) : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('style_id', 'Style:') !!}
                {!! Form::select('style_id', [''=>'Choose Options'] + $styles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!!  Form::submit('Update User', ['class'=>'btn btn-primary col-sm-12']) !!}
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
@stop
