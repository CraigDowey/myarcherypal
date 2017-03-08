@extends('layouts.admin')


@section('content')

    <h1>Users</h1>

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

@stop
