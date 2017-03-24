@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to My Archery Pal!</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>My Archery Pal is a space in which archers can store their scores and score sheets
                                that are displayed on the leader board, if you submit a score without attaching a
                                score sheet your score will not be displayed on the leader board.
                            </p>
                            <p>
                            Currently rounds that are supported are:
                            </p>
                            <p>
                                - Portsmouth
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <img src="http://localhost/my-archery-pal/public/images/archery_targets.jpg" class="img-responsive img-rounded">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
