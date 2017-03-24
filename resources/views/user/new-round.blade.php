@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Round
                    </div>
                    <div class="panel-body">
                        <div class="row">
                                @include('include.form-errors')
                        </div>
                        <div class="row">
                            <div class="col-sm-6">

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
                                        {!! Form::label('calc_score', 'Input Score:') !!}
                                        {!! Form::text('calc_score', null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('average_arrow', 'Input Average:') !!}
                                        {!! Form::text('average_arrow', null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('tens', 'Input Xs/10s:') !!}
                                        {!! Form::text('tens', null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!!  Form::submit('Upload Score', ['class'=>'btn btn-primary col-sm-12']) !!}
                                    </div>

                                    {!!  Form::close() !!}

                                </div>
                            <div class="col-sm-6">
                                <div class="calc-app-container">
                                    <div class="score-lines-container">
                                    </div>
                                        <div class="all-score-container">
                                            <div class="score-container">
                                                <h3 class="score-text">Total Score: </h3>
                                                <h3 id="score" class="score-text">0</h3>
                                            </div>
                                            <div class="score-container">
                                                <h3 class="score-text">X's/10's: </h3>
                                                <h3 id="tie_breaker" class="score-text">0</h3>
                                            </div>
                                            <div class="score-container average-score-container">
                                                <h3 class="score-text">Average Score: </h3>
                                                <h3 id="average_score" class="score-text">0.0</h3>
                                            </div>
                                        </div>
                                    <div class="calc-app-container cal-container">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

