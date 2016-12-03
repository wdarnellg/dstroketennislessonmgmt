@extends('layouts.master')

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
                        @foreach($players as $player)
                          <h3>{{ $player->getFullName($player->id) }}</h3>  
                            {{ $player->gender }}<br>
                           Birthdate: {{ $player->birthdate->format('m-d-Y') }}<br>
                           Family: {{ $player->users->famname }}<br>
                           <hr>
                           
                           <hr>
                           <h4>Packages</h4>
                         <div class="card card-inverse text-xs-center" style="background-color: #abdef2; border-color: #8971e8;">
                        <div class="card-block">
                       <blockquote class="card-blockquote">                  
                            <ul class="list-group">
                                @if(count($lessonhours) == 0)
                                    <li class="list-group-item">
                                        No Lesson Records
                                    </li>
                                    @else
                                        @foreach($lessonhours as $hours)

                                        <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                                            Sign Up Date:<br>
                                            {{ $hours->signup_date->format('m-d-Y') }}<br>
                                            <a href="/mylessonhours/{{$hours->id}}" class="pull-right"> Hours Remaining: {{ $hours->packages->numberofhours - $hours->hoursused->sum('numberofhours') }}</a>
                                            Lesson Package Type:<br>
                                            {{ $hours->packages->name }}<br>
                                        </li>
                                        @endforeach
                                @endif
                                    
                                </ul>
                        </blockquote>
                    </div>
                    </div>     
                           
                        @endforeach
                        </li>
                        </ul>
                     
                    </blockquote>
                    
                </div>
            </div>
            
    </section>
    </div>
@endsection