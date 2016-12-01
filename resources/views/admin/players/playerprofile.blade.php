@extends('layouts.admin-master')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

<div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-4 col-sm-5">
@include('includes.info-box')
            <section>
                <h4>Player Profile</h4>
            <div class="card card-inverse text-xs-center" style="background-color: #4286f4; border-color: #b5cbdd;">
                <div class="card-block">
                   <blockquote class="card-blockquote">
                    <ul class="list-group">
                        <li class="list-group-item">
                          <h3>{{ $players->getFullName($players->id) }}</h3>  
                            {{ $players->gender }}<br>
                            <a href="/players/{{ $players->id }}/edit" class="btn btn-default btn- pull-right">
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                                       Edit {{ $players->getFullName($players->id) }}</a>
                           Birthdate: {{ $players->birthdate->format('m-d-Y') }}<br>
                           
                           Family: {{ $players->users->famname }}<br>
                           <hr>

                            <div class="card card-inverse text-xs-center" style="background-color: #abdef2; border-color: #8971e8;">
                                <div class="card-block">
                                   <blockquote class="card-blockquote">                  
                                        <ul class="list-group">
                                            @if(count($players->lessonhours) == 0)
                                                <li class="list-group-item">
                                                    No Lesson Records
                                                </li>
                                                @else
                                                
                                                    @foreach($players->lessonhours as $hours)
                                                    <a href="/lessonhours/{{ $hours->id }}"> 
                                                    <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                                                        Sign Up Date:<br>
                                                        {{ $hours->signup_date->format('m-d-Y') }}<br>
                                                        <p class="pull-right">
                                                            Hours Left: {{ $hours->packages->numberofhours - $hours->hoursused->sum('numberofhours') }}
                                                        </p>
                                                        Lesson Package Type:<br>
                                                        {{ $hours->packages->name }}<br>
                                                    </li>
                                                    </a>
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
    </section>
    </div>
    <div class="col-md-4 col-sm-5">
           <form role="form" action="/players/{{ $players->id }}/lessonhours" method="POST">
            <div class="row">
            <div class="form-group">
                <label for="signup_date">Sign Up Date:</label>
                <input class="form-control" type="text" name="signup_date" id="datepicker" placeholder="Sign Up Date" value="{{ Request::old('signup_date') }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="packages_id">Package:</label>
                <select class="form-control" name="packages_id" id="packages_id">
                    <option selected>Choose Package</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add A Lesson Package</button>
        </form>        
    </div>
    
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/src/js/script.js"></script>
@endsection