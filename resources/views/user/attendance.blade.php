@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="fa fa-university"></i> Attendance</h1>
            </div>

            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Present</th>
                    </tr>

                    <?php $no=1; ?>

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$user->attendance->date}}</td>
                        <td>{{$user->attendance->time}}</td>
                        <td>{{$user->attendance->present}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@stop