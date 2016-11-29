@extends('layouts.admin-master')

@section('title')
    Edit Family
@endsection

@section('content')
    <div class="row">
    <div class="col-md-4 col-sm-5"></div>
    <div class="col-md-4">
@include('includes.info-box')
        <section>
            <h4>D`Stroke Tennis Administrator</h4>
            <article>
             <form role="form" action="/users/{{ $families->id }}" method="post">
                 {{ method_field('PATCH') }}
               <div class="col-md-4">
         <form role="form" action="users" method="post">
            <div class="row">
            <div class="form-group">
                <label for="famname">User Name:</label>
                <input class="form-control" type="text" name="famname" id="famname" value="{{ $families->famname }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <!--<label for="email">User Email:</label>-->
                <input class="form-control" type="hidden" name="email" id="email" value="{{ $families->email }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <!--<label for="password">Password:</label>-->
                <input class="form-control" type="hidden" name="password" id="password" value="{{ $families->password }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input class="form-control" type="tel" name="phone" id="phone" value="{{ $families->phone }}"/>
            </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-default">Update Family</button>
                <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            </div>
            </div>
        </form>  
            </article>
        </section>
    </div>
    </div>
    <div class="col-md-4 col-sm-5"></div>
@endsection