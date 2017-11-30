@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create New User</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">


                <form class="" action="{{route('user.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group{{($errors->has('name')) ? $errors->first('name'): ''}}">
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name Here">
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('student_id')) ? $errors->first('student_id'): ''}}">
                        <input type="text" name="student_id" class="form-control" placeholder="Student ID">
                        {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('mac_address')) ? $errors->first('mac_address'): ''}}">
                        <input type="text" name="mac_address" class="form-control" placeholder="MAC Address">
                        {!! $errors->first('mac_address', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('serial_no')) ? $errors->first('serial_no'): ''}}">
                        <input type="text" name="serial_no" class="form-control" placeholder="Serial No">
                        {!! $errors->first('serial_no', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('desk_no')) ? $errors->first('desk_no'): ''}}">
                        <input type="text" name="desk_no" class="form-control" placeholder="Desk No">
                        {!! $errors->first('desk_no', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('password')) ? $errors->first('password'): ''}}">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password Here">
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{($errors->has('password_confirmation')) ? $errors->first('password_confirmation'): ''}}">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password Here">
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
