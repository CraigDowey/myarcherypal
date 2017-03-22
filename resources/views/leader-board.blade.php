@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<h1>Leader Board</h1>--}}
        <div class="row">

            {{--<div class="form-group">--}}
                {{--{!! Form::label('round_id', 'Round:')!!}--}}
                {{--{!! Form::select('round_id', [''=>'Choose Round'] + $rounds, null, ['class'=>'form-control']) !!}--}}
            {{--</div>--}}

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Recurve</div>

                    <div class="panel-body">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($recurves)
                                    @foreach($recurves as $recurve)
                                        <tr>
                                            <td><img height="50" src="{{$recurve->photo ? URL::to($recurve->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder2.png'}}" ></td>
                                            <td>{{$recurve->name}}</td>
                                            <td>{{$recurve->round}}</td>
                                            <td>{{$recurve->score}}</td>
                                            <td>{{$recurve->tie_breaker}}</td>
                                            <td>{{$recurve->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Compound</div>

                    <div class="panel-body">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($compounds)
                                    @foreach($compounds as $compound)
                                        <tr>
                                            <td><img height="50" src="{{$compound->photo ? URL::to($compound->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder2.png'}}" ></td>
                                            <td>{{$compound->name}}</td>
                                            <td>{{$compound->round}}</td>
                                            <td>{{$compound->score}}</td>
                                            <td>{{$compound->tie_breaker}}</td>
                                            <td>{{$compound->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Barebow</div>

                    <div class="panel-body">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($barebows)
                                    @foreach($barebows as $barebow)
                                        <tr>
                                            <td><img height="50" src="{{$barebow->photo ? URL::to($barebow->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder2.png'}}" ></td>
                                            <td>{{$barebow->name}}</td>
                                            <td>{{$barebow->round}}</td>
                                            <td>{{$barebow->score}}</td>
                                            <td>{{$barebow->tie_breaker}}</td>
                                            <td>{{$barebow->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Longbow</div>

                    <div class="panel-body">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($longbows)
                                    @foreach($longbows as $longbow)
                                        <tr>
                                            <td><img height="50" src="{{$longbow->photo ? URL::to($longbow->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder2.png'}}" ></td>
                                            <td>{{$longbow->name}}</td>
                                            <td>{{$longbow->round}}</td>
                                            <td>{{$longbow->score}}</td>
                                            <td>{{$longbow->tie_breaker}}</td>
                                            <td>{{$longbow->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
