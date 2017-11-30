@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">  <h4 >User Profile</h4></div>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">


                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                        <div class="container" >
                            <h2>{{$user->name}} {{$user->surname}}</h2>
                            <p><b>Student</b></p>


                        </div>
                        <hr>
                        <ul class="container details" >
                            <li><p><b class="material-icons" style="font-size:18px">dvr</b>         {{$user->mac_address}}</p></li>
                            <li><p><b class="material-icons" style="font-size:18px">dvr</b>          {{$user->desk_no}}</p></li>
                            <li><p><b class="material-icons" style="font-size:18px">group</b>         {{$user->student_id}}</p></li>
                            <li><p><b class="material-icons" style="font-size:18px">group</b>         {{$user->serial_no}}</p></li>
                            <li><p><b class="material-icons" style="font-size:18px">group</b>         {{$user->state}}</p></li>
                        </ul>
                        <hr>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{route('user.edit', $user->id)}}", class="btn btn-primary">Edit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@stop