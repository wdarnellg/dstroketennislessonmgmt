@extends('layouts.admin-master')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-4 col-sm-5">
    
        <h5><a class="pull-right" href="/lessonhours/{{ $lessonhours->id }}">Package Details</a></h5>
           
        </div>
        <div class="col-md-4 col-sm-6">
            @include('includes.info-box')
            <h4>Edit Lesson Hours</h4>
            <form role="form" action="/lessonhours/{{ $lessonhours->id }}" method="POST">
                {{ method_field('PATCH') }}
               <div class="form-group">
                <label for="players_id">{{ $lessonhours->players->getFullName($lessonhours->players_id) }}</label>
                <input class="form-control" type="hidden" name="players_id" id="players_id" value="{{ $lessonhours->players_id }}"/>
            </div> 
                
            <div class="row">
                <div class="form-group">
                <div class="input-group date">
                <label for="signup_date">Lesson Date:</label>
                <input class="form-control" type="text" name="signup_date" id="signup_date" value="{{ $lessonhours->signup_date->format('m/d/Y') }}"/>
                </div>
            </div>
            </div>
            
            <div class="row">
            <div class="form-group">
                <label for="packages_id">Package:</label>
                <select class="form-control" name="packages_id" id="packages_id">
                    <option selected>{{ $lessonhours->packages->name }}</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                    @endforeach
                </select>
                
                    
                
            </div>
            </div>
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <input class="btn btn-default" type="submit" value="Update Lesson Hours"/>
        </form> 
        </div>
        
        </div>
        
        
@endsection