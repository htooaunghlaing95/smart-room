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

                    @foreach($users->attendance()->get() as $attendance)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$attendance->date}}</td>
                        <td>{{$attendance->time}}</td>
                        <td>{{$attendance->present}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop