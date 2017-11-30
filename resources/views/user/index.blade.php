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
                            <li><p><i class="fa fa-wifi"></i>{{$user->mac_address}}</p></li>
                            <li><p><img src="{{ URL::to('/img/table.png') }}" width="18px" height="18px"/>{{$user->desk_no}}</p></li>
                            <li><p><b class="fa fa-id-card fa-2x" style="font-size:18px"></b>{{$user->student_id}}</p></li>
                            <li><p><b class="fa fa-mobile-phone fa-2x"></b>{{$user->serial_no}}</p></li>
                            <li><p><b class="fa fa-lightbulb-o fa-2x"></b>{{$user->state}}</p></li>
                        </ul>
                        <hr>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{route('user.edit', $user->id)}}", class="btn btn-primary"><i class="fa fa-edit pull-left"> Edit</i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@stop