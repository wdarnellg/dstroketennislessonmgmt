@extends('layouts.admin-master')

@section('title')
    Edit Player
@endsection

@section('content')
    <div class="row">
    <div class="col-md-4 col-sm-5"></div>
    <div class="col-md-4">
@include('includes.info-box')
        <section>
            <h4>D`Stroke Tennis Administrator</h4>
            <article>
             
               <div class="col-md-4">
         <form role="form" action="/players/{{ $player->id }}" method="POST">
             {{ method_field('PATCH') }}
            <div class="row">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input class="form-control" type="text" name="fname" id="fname" value="{{ $player->fname }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input class="form-control" type="text" name="lname" id="lname" value="{{ $player->lname }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input class="form-control" type="text" name="gender" id="gender" value="{{ $player->gender }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input class="form-control" type="text" name="birthdate" id="datepicker" value="{{ $player->birthdate->format('m/d/Y') }}"/>
            </div>
            </div>
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Edit Player</button>
            
        </form>
            </article>
        </section>
    </div>
    </div>
    <div class="col-md-4 col-sm-5"></div>
@endsection