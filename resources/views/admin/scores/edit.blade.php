@extends('layouts.admin')


@section('content')
    <h1>Edit User</h1>
    <div class="row">
        @include('include.form-errors')
    </div>
    <div class="row">
        <div class="col-sm-3">
            <img class="img-responsive" src="{{$scores->photo ? URL::to($scores->photo->file) : 'http://placehold.it/400x400'}}">
        </div>
        <div class="col-sm-9">
            {!! Form::model($scores, ['method'=>'PATCH', 'action'=> ['AdminScoresController@update', $scores->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('photo_id', 'Change Score Sheet:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('round_id', 'Round:') !!}
                {!! Form::select('round_id', [''=>'Choose Round'] + $rounds, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('average_arrow', 'Average:') !!}
                {!! Form::text('average_arrow', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tens', 'Xs/10s:') !!}
                {!! Form::text('tens', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('calc_score', 'Total:') !!}
                {!! Form::text('calc_score', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::submit('Update Score', ['class'=>'btn btn-primary col-sm-12']) !!}
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
@stop