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
                </tr>
                </thead>
                <tbody>

                @if($users)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><img height="50" src="{{$user->photo ? URL::to($user->photo->file) : 'http://placehold.it/50x50'}}" ></td>
                            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a> </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->style? $user->style->name : 'No Style Selected'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
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
                    <th>X's/10's</th>
                    <th>Score</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>

                @if($scores)
                    @foreach($scores as $score)
                        <tr>
                            <td>{{$score->id}}</td>
                            <td><img height="75" src="{{$score->photo ? URL::to($score->photo->file) : 'http://placehold.it/400x400'}}" ></td>
                            <td>{{$score->user->name}}</td>
                            <td><a href="{{route('admin.scores.edit', $score->id)}}">{{$score->round ? $score->round->name : 'No Round Selected'}}</a></td>
                            <td>{{$score->XsOr10s}}</td>
                            <td>{{$score->score}}</td>
                            <td>{{$score->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>

@stop
