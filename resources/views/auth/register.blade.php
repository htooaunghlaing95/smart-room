@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                            <label for="student_id" class="col-md-4 control-label">Student ID</label>

                            <div class="col-md-6">
                                <input id="student_id" type="text" class="form-control" name="student_id" value="{{ old('student_id') }}" required>

                                @if ($errors->has('student_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mac_address') ? ' has-error' : '' }}">
                            <label for="mac_address" class="col-md-4 control-label">Mac Address</label>

                            <div class="col-md-6">
                                <input id="mac_address" type="text" class="form-control" name="mac_address" value="{{ old('mac_address') }}" required>

                                @if ($errors->has('mac_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mac_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('serial_no') ? ' has-error' : '' }}">
                            <label for="serial_no" class="col-md-4 control-label">Serial No</label>

                            <div class="col-md-6">
                                <input id="serial_no" type="text" class="form-control" name="serial_no" value="{{ old('serial_no') }}" required>

                                @if ($errors->has('serial_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serial_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('desk_no') ? ' has-error' : '' }}">
                            <label for="desk_no" class="col-md-4 control-label">Desk</label>

                            <div class="col-md-6">
                                <input id="desk_no" type="text" class="form-control" name="desk_no" value="{{ old('desk_no') }}" required autofocus>

                                @if ($errors->has('desk_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desk_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
