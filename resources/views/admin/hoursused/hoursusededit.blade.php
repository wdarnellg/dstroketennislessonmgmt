@extends('layouts.admin-master')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

<div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-4 col-sm-5"></div>

<div class="col-md-4 col-sm-6">
     @include('includes.info-box')
     <div class="row">
         <h4>Edit Hours Used For: {{ $hoursused->lessonhours->players->getFullName($hoursused->lessonhours->players_id) }}</h4>
        <h5 class="pull-right"><a href="/lessonhours/{{ $hoursused->lessonhours_id }}">Package Details</a></h5>
     </div>
            <form role="form" action="/hoursused/{{ $hoursused->id }}" method="POST">
                {{ method_field('PATCH') }}
            <div class="row">
                <div class="form-group">
                <div class="input-group date">
                <label for="date_time">Lesson Date:</label>
                <input class="form-control" type="text" name="date_time" id="datepicker" value="{{ $hoursused->date_time->format('m/d/Y') }}"/>
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="numberofhours">Hours Used:</label>
                <select class="form-control" name="numberofhours" id="numberofhours">
                  <option selected>{{ $hoursused->numberofhours }}</option>
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
                <textarea class="form-control" rows="5" name="comments" id="comments" value="{{ $hoursused->comments }}">
                    {{ old('comments', $hoursused->comments) }}
                </textarea>
            </div>
            </div>
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <input class="btn btn-default" type="submit" value="Update Hours Used"/>
        </form> 
        </div>
        
</div>
        
    @endsection