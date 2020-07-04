@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="company-profile">
                @if(!empty(Auth::user()->company->cover_photo))
                    <img src="/uploads/coverphoto/{{Auth::user()->company->cover_photo}}" width="100%" alt="">
                @else
                    <img src="{{asset('cover/cov-photo.jpg')}}" width="100%" alt="">                
                @endif
                <div class="company-decription mt-3">
					@if(empty(Auth::user()->company->logo))
						<img src="{{asset('logo/logo.png')}}" width="100">
					@else
						<img src="/uploads/logo/{{Auth::user()->company->logo}}" width="100">
					@endif

                    <h1>{{$company->cname}}</h1>

                    <h5 class="mb-3">{{$company->description}}</h5>

                    <p><strong>Slogan</strong>: {{$company->slogan}}</p>
                    <p><strong>Address</strong>: {{$company->address}}</p>
                    <p><strong>Phone</strong>: {{$company->phone}}</p>
                    <p><strong>Website</strong>: <a href="#">{{$company->website}}</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th></th>
                    <th>Position</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($company->jobs as $job)
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
</div>
@endsection