@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$userInfo->style ? $userInfo->style->name : 'Dashboard'}}
                </div>

                <div class="panel-body">

                    <div class="col-sm-3">
                        <img src="{{$userInfo->photo ? URL::to($userInfo->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder.png'}}" class="img-responsive img-rounded">
                    </div>

                    <div class="col-sm-9">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Score Sheet</th>
                                <th>Round</th>
                                <th>Average</th>
                                <th>Score</th>
                                <th>Posted</th>
                                <th>Delete Score</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($scores)
                                @foreach($scores as $score)
                                    <tr>
                                        <td><img height="50" src="{{$score->photo ? URL::to($score->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder2.png'}}" ></td>
                                        <td>{{$score->round ? $score->round->name : 'No Round Selected'}}</td>
                                        <td>{{$score->average}}</td>
                                        <td>{{$score->score}}</td>
                                        <td>{{$score->created_at->diffForHumans()}}</td>
                                        <td>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['HomeController@destroy', $score->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                                        <div class="form-group">
                                        {!!  Form::submit('Delete', ['class'=>'btn btn-danger ']) !!}
                                        </div>

                                        {!!  Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <script>

                                function ConfirmDelete()
                                {
                                    var x = confirm("Are you sure you want to delete?");
                                    if (x)
                                        return true;
                                    else
                                        return false;
                                }

                            </script>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
