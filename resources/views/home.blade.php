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
                        <img src="{{$userInfo->photo ? URL::to($userInfo->photo->file) : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
                    </div>

                    <div class="col-sm-9">
                        {{--You are logged in {{$userInfo->name}}!--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Style</th>
                                <th>Round</th>
                                <th>Average</th>
                                <th>Score</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--@if($users)--}}
                                {{--@foreach($users as $user)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{$user->id}}</td>--}}
                                        {{--<td><img height="50" src="{{$user->photo ? URL::to($user->photo->file) : 'http://placehold.it/50x50'}}" ></td>--}}
                                        {{--<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a> </td>--}}
                                        {{--<td>{{$user->email}}</td>--}}
                                        {{--<td>{{$user->style? $user->style->name : 'No Style Selected'}}</td>--}}
                                        {{--<td>{{$user->created_at->diffForHumans()}}</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
