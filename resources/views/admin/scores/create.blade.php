@extends('layouts.admin')


@section('content')

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
            {!!  Form::submit('Upload Score', ['class'=>'btn btn-primary']) !!}
        </div>

        {!!  Form::close() !!}

    </div>

    <div class="row">
        @include('include.form-errors')
    </div>

@stop