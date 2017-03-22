@extends('layouts.admin')


@section('content')


    <h1>Scores</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>User</th>
            <th>Round</th>
            <th>X's/10's:</th>
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

@stop