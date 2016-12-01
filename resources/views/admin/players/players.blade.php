@extends('layouts.admin-master')

@section('title')
    Player List
@endsection

@section('content')

<div class="row">
    <div class="col-md-4 col-sm-5"></div>
    <div class="col-md-4">
@include('includes.info-box')
        <h4>Main Player List</h4>
            <article>
            
        @if(count($players) == 0)
            No Player Records
       @else
    <ul class="list-group">
        @foreach($players as $player)
            <li class="list-group-item">
                <a href="/players/{{ $player->id }}">{{ $player->getFullName($player->id) }}</a>
                <p> Number of Packages: {{ $player->lessonhours->count('players') }}</p><br>
                
            </li>
        @endforeach
        </ul>         
    @endif
    </article>
    </section>
    </div>
    <div class="col-md-4 col-sm-5"></div>
    
</div>

@endsection

<script type="text/javascript" src="/src/js/script.js"></script>