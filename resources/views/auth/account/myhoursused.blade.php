@extends('layouts.master')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-4 col-sm-5">
    @include('includes.info-box')
        
            <div class="card card-inverse text-xs-center" style="background-color: #4286f4; border-color: #b5cbdd;">
                <div class="card-block">
                   <blockquote class="card-blockquote">
                       
                        <ul class="list-group">
                     
                            <li class="list-group-item">
                                <div class="card card-inverse text-xs-center" style="background-color: white; border-color: #8971e8;">
                            <div class="card-block">
                               <blockquote class="card-blockquote">
                                   <h4>{{ $lessonhours->players->getFullName($lessonhours->players_id) }}</h4>
                                   <h4>Package Details for: {{ $lessonhours->packages->name }}<br> Signed up: {{ $lessonhours->signup_date->format('m-d-Y') }}</h4>
                                <ul class="list-group">
                                
                                @if(count($lessonhours->hoursused) == 0)
                                    <li class="list-group-item">
                                        No Hours Used
                                    </li>
                                    @else
                                    <li class="list-group-item card-inverse">
                                        <h4>Hours Used: {{ $lessonhours->hoursused->sum('numberofhours') }}</h4>
                                       <h4>Hours Remaining: {{ $lessonhours->packages->numberofhours - $lessonhours->hoursused->sum('numberofhours')  }}</h4>
                                    </li>
                                        @foreach($lessonhours->hoursused as $hour)
                                        <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                                           Lesson Date:  <strong>{{ $hour->date_time->format('D-M-d-Y') }}</strong><br>
                                            Hours in lesson: {{ $hour->numberofhours }}<br>
                                            Comments:<br>
                                            {{ $hour->comments }}
                                        </li>
                                        @endforeach
                                @endif
                                </ul>
                                </blockquote>
                            </div>
                    </div>
                </li>
            </ul>
        </blockquote>
                    
          </div>
          </div>
          
        
        </div>
        <div class="col-md-4 col-sm-6"></div>
@endsection