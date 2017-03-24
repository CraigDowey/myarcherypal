@extends('layouts.admin')


@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Users</div>

        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Style</th>
                    <th>Created</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @if($users)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><img height="50" src="{{$user->photo ? URL::to($user->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder.png'}}" ></td>
                            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a> </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->style? $user->style->name : 'No Style Selected'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                                <div class="form-group">
                                    {!!  Form::submit('Delete', ['class'=>'btn btn-danger ']) !!}
                                </div>

                                {!!  Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Scores</div>

        <div class="panel-body">

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>User</th>
                    <th>Round</th>
                    <th>Score</th>
                    <th>Average</th>
                    <th>X's/10's</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @if($scores)
                    @foreach($scores as $score)
                        <tr>
                            <td>{{$score->id}}</td>
                            <td><img height="75" src="{{$score->photo ? URL::to($score->photo->file) : 'http://localhost/my-archery-pal/public/images/placeholder2.png'}}" ></td>
                            <td>{{$score->user->name}}</td>
                            <td><a href="{{route('admin.scores.edit', $score->id)}}">{{$score->round ? $score->round->name : 'No Round Selected'}}</a></td>
                            <td>{{$score->calc_score}}</td>
                            <td>{{$score->average_arrow}}</td>
                            <td>{{$score->tens}}</td>
                            <td>{{$score->created_at->diffForHumans()}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminScoresController@destroy', $score->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                                <div class="form-group">
                                    {!!  Form::submit('Delete', ['class'=>'btn btn-danger ']) !!}
                                </div>

                                {!!  Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>

@stop
