@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit User Information</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">

                <form class="" action="{{route('user.update', $user->id)}}" method="post">
                    <input type="hidden" name="_method" value="PATCH">
                    {{csrf_field()}}

                    <div class="form-group{{($errors->has('name')) ? $errors->first('name'): ''}}">
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="{{$user->name}}">
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('mac_address')) ? $errors->first('mac_address'): ''}}">
                        <input type="text" name="mac_address" class="form-control" placeholder="MAC Address" value="{{$user->mac_address}}">
                        {!! $errors->first('mac_address', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('student_id')) ? $errors->first('student_id'): ''}}">
                        <input type="text" name="student_id" class="form-control" placeholder="Student Id" value="{{$user->student_id}}">
                        {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('serial_no')) ? $errors->first('serial_no'): ''}}">
                        <input type="text" name="serial_no" class="form-control" placeholder="Serial No" value="{{$user->serial_no}}">
                        {!! $errors->first('serial_no', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('desk_no')) ? $errors->first('desk_no'): ''}}">
                        <input type="text" name="desk_no" class="form-control" placeholder="Desk No" value="{{$user->desk_no}}">
                        {!! $errors->first('desk_no', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('password')) ? $errors->first('password'): ''}}">
                        <input type="password" name="password" class="form-control" placeholder="Enter Your New Password">
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('password_confirmation')) ? $errors->first('password_confirmation'): ''}}">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="save">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop