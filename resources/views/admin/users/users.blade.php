@extends('layouts.admin-master')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4">
@include('includes.info-box')
            <section>
                <h4>D`Stroke Tennis Administrator</h4>
            <article>
            
            <h3>Families</h3>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                       <a href="/users/{{ $user->id }}">{{ $user->famname }}</a>
                       <a href="#" class="pull-right"> Number of members: {{ $user->players->count($user->players) }}</a>
                   </li>
                @endforeach
             </ul>
    </article>
   
    </section>
    </div>
    <div class="col-md-4">
         <form role="form" action="users" method="post">
            <div class="row">
            <div class="form-group">
                <label for="famname">User Name:</label>
                <input class="form-control" type="text" name="famname" id="famname" placeholder="Family Name"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="email">User Email:</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Family Email (Username)"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Temp Password"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input class="form-control" type="tel" name="phone" id="phone" placeholder="Phone"/>
            </div>
            </div>
            <div class="row">
                <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create user</button>
                
                <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            </div>
            </div>
        </form>
    </div>
    
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/src/js/script.js"></script>
@endsection