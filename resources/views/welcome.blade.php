@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Recent Jobs</h1>
        <table class="table">
            <thead>
                <th></th>
                <th>Position</th>
                <th>Address</th>
                <th>Date</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td><img src="{{asset('avatar/man.jpg')}}" width="80" alt=""></td>
                        <td>{{$job->position}}
                            <br>
                            <i class="fa fa-clock-o"></i> {{$job->type}}
                        </td>
                        <td><i class="fa fa-map-marker"></i> {{$job->address}}</td>
                        <td><i class="fa fa-globe"></i><br>{{$job->last_date}}</td>
                        <td>
                            <a href="/jobs/{{$job->id}}/{{$job->slug}}">
                                <button class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection