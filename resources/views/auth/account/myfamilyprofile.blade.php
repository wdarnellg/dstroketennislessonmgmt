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
                <h5>Family Profile</h5>
            <div class="card card-inverse text-xs-center" style="background-color: #4286f4; border-color: #b5cbdd;">
                <div class="card-block">
                   <blockquote class="card-blockquote">
                    
                    <ul class="list-group">
                        
                        <li class="list-group-item">
                            <h3>Family: {{ $families->famname }}</h3>
                            
                           <p>{{ $families->phone }}</p> 
                           <p>{{ $families->email }}</p>
                        
                             <ul class="list-group">
                                 @if(count($families->players) == 0)
                                    <li class="list-group-item">
                                        No members added
                                    </li>
                                @endif    
                                @foreach(array_chunk($families->players->getCollection->all(), 1) as $row)
                                    <div class="row">
                                        @foreach($row as $player)
                                    <a href="/mylessonhours"> 
                                        <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                                            {{ $player->getFullName($player->id) }}<br>
                                            {{ $player->gender }}<br>
                                            {{ $player->birthdate->format('M-d-Y') }}<br>
                                        </li>
                                    </a>
                                @endforeach
                                    </div>
                                    
                            @endforeach
                            </ul>
                        </li>
            </ul>
                </blockquote>
            </div>
        </div>
    
    </section>
    </div>
    <div class="col-md-4 col-sm-5">
        <h4>Add a New Family Member (Player)</h4>
        <form role="form" action="/myfamilyprofile/{{ $families->id }}/players" method="POST">
            <div class="row">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                  <option selected>Choose Gender</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input class="form-control" type="text" name="birthdate" id="datepicker" placeholder="Please format m/d/yyyy"/>
            </div>
            </div>
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add Family Member</button>
            
        </form>
    </div>
    
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/src/js/script.js"></script>
@endsection