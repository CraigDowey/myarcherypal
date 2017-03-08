@extends('layouts.admin')



@section('content')

    <h1>Create Post</h1>

    <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminScoresController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('photo_id', 'Upload Score Sheet:') !!}
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
            {!!  Form::submit('Upload Score', ['class'=>'btn btn-primary']) !!}
        </div>

        {!!  Form::close() !!}

    </div>

    <div class="row">
        @include('include.form-errors')
    </div>



@stop