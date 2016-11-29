@extends('layouts.admin-master')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-4 col-sm-5">
    @include('includes.info-box')
        <h4>Lesson Package Details</h4>
            <div class="card card-inverse text-xs-center" style="background-color: #4286f4; border-color: #b5cbdd;">
                <div class="card-block">
                   <blockquote class="card-blockquote">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h4>{{ $lessonhours->players->getFullName($lessonhours->players->id) }}</h4>
                      <h5>Lesson Package:  {{ $lessonhours->packages->name }}</5>  <a href="#" class="btn btn-default btn-sm" style="float: right">View All Lessons</a>
                      <h5>Signup Date: {{ $lessonhours->signup_date->format('m-d-Y') }}</h5>
                      <a href="/admin/lessonhours/lessonhours/{{ $lessonhours->id }}/edit" class="btn btn-default btn-sm pull-right">Edit Package</a>
                     
                      <h4>Hours Remaining: {{ $lessonhours->packages->numberofhours - $lessonhours->hoursused->sum('numberofhours')  }}</h4>
                            </li>
                            <li class="list-group-item">
                                <div class="card card-inverse text-xs-center" style="background-color: white; border-color: #8971e8;">
                            <div class="card-block">
                               <blockquote class="card-blockquote">
                                   <ul class="list-group">
                                        <li class="list-group-item">
                                            <ul class="list-group">
                                            @if(count($lessonhours->hoursused) == 0)
                                                <li class="list-group-item">
                                                    No Hours Used
                                                </li>
                                                @else
                                                    @foreach($lessonhours->hoursused as $hour)
                                                    <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                                                       Lesson Date:  <strong>{{ $hour->date_time->format('D-M-d-Y') }}</strong><br>
                                                        Hours in lesson: {{ $hour->numberofhours }}<br>
                                                        <a href="/admin/hoursused/{{ $hour->id }}/edit" class="btn btn-sm btn-default pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                        Comments:<br>
                                                        {{ $hour->comments }}
                                                    </li>
                                                    @endforeach
                                            @endif
                                            </ul>
                                        </li>
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
        <div class="col-md-4 col-sm-6">
            <form role="form" action="/lessonhours/{{ $lessonhours->id }}/hoursused" method="POST">
            <div class="row">
                <div class="form-group">
                <div class="input-group date">
                <label for="date_time">Lesson Date:</label>
                <input class="form-control" type="text" name="date_time" id="datepicker" placeholder="Lesson Date"/>
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="numberofhours">Hours Used:</label>
                <select class="form-control" name="numberofhours" id="numberofhours">
                  <option selected>Hours</option>
                    <option value=".5">Half-hour</option>
                    <option value=".75">45 minutes</option>
                    <option value="1">1 hour</option>
                    <option value="1.25">An hour-15 minutes</option>
                    <option value="1.5">An hour-30 minutes</option>
                    <option value="1.75">An hour-45 minutes</option>
                    <option value="2">2 hours</option>
                </select>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea class="form-control" rows="5" name="comments" id="comments">
                    
                </textarea>
            </div>
            </div>
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <input class="btn btn-default" type="submit" value="Add Hours Used"/>
        </form> 
        </div>
        
        </div>
        
        
@endsection