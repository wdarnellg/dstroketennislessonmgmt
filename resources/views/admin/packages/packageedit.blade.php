@extends('layouts.admin-master')

@section('title')
    Lesson Packages
@endsection

@section('content')
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4">
       
    </div>
    <div class="col-md-4">
        @include('includes.info-box')
        <div class="row">
            <h3>Create Lesson Packages Form</h3>
        </div>
        <form role="form" action="/packageform/{{ $packages->id }}"method="POST">
             {{ method_field('PATCH') }}
            <div class="row">
            <div class="form-group">
                <label for="name">Package Name:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $packages->name }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group" >
                <label for="cost">Cost:</label>
                <input class="form-control" type="text" name="cost" id="cost" value="{{ $packages->cost }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="cost">Number of Hours:</label>
                <input class="form-control" type="text" name="numberofhours" id="numberofhours" value="{{ $packages->numberofhours }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="type">Type:</label>
               <input class="form-control" type="text" name="type" id="type" value="{{ $packages->type}}"/>
            </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-default">Update Package</button>
                <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            </div>
            </div>
                    
        </form>
    </div>
    <div class="col-md-4"></div>
    </div>
@endsection