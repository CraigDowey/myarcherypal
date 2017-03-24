@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Recurve</div>

                    <div class="panel-body">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Score Sheet</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's/10's</th>
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
                                            <td>{{$recurve->calc_score}}</td>
                                            <td>{{$recurve->tens}}</td>
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
                                    <th>Score Sheet</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's/10's</th>
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
                                            <td>{{$compound->calc_score}}</td>
                                            <td>{{$compound->tens}}</td>
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
                                    <th>Score Sheet</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's/10's</th>
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
                                            <td>{{$barebow->calc_score}}</td>
                                            <td>{{$barebow->tens}}</td>
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
                                    <th>Score Sheet</th>
                                    <th>Name</th>
                                    <th>Round</th>
                                    <th>Score</th>
                                    <th>X's/10's</th>
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
                                            <td>{{$longbow->calc_score}}</td>
                                            <td>{{$longbow->tens}}</td>
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
