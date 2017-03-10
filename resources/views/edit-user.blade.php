@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit User Information
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{$user->photo ? URL::to($user->photo->file) : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
                            </div>

                            <div class="col-sm-9">

                                {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['UsersController@update', $user->id],'files'=>true]) !!}

                                    <div class="form-group">
                                        {!! Form::label('name', 'Name:') !!}
                                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('email', 'Email:') !!}
                                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('photo_id', 'Photo:') !!}
                                        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('style_id', 'Style:') !!}
                                        {!! Form::select('style_id', [''=>'Choose Options'] + $styles, null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!!  Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
                                    </div>

                                {!!  Form::close() !!}

                                {!! Form::open(['method'=>'DELETE', 'action'=>['UsersController@destroy', $user->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                                    <div class="form-group">
                                        {!!  Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
                                    </div>

                                {!!  Form::close() !!}
                            </div>
                        </div>#

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

                        <div class="row">
                                @include('include.form-errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

