@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Upload New Round
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{$user->photo ? URL::to($user->photo->file) : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
                            </div>

                            <div class="col-sm-9">

                                {!! Form::open(['method'=>'POST', 'action'=> 'ScoresController@store', 'files'=>true]) !!}

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
                        </div>

                        <div class="row">
                            @include('include.form-errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

