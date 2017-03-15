@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>


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
                {!! Form::label('average', 'Average Score:') !!}
                {!! Form::text('average', null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('score', 'Total:') !!}
                {!! Form::text('score', null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!!  Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!!  Form::close() !!}

            {!! Form::model($scores, ['method'=>'DELETE', 'action'=> ['AdminScoresController@destroy', $scores->id], 'onsubmit' => 'return ConfirmDelete()' ,'files'=>true]) !!}

            <div class="form-group">
                {!!  Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

    <div class="row">
        @include('include.form-errors')
    </div>

@stop