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
       <table class="table">
           <thead>
               <tr>
                   <th>Name</th>
                   <th>Number of Packages</th>
               </tr>
           </thead>
           <tbody>
            @foreach($players as $player)
            <tr>
                <td>
                    <a href="/players/{{ $player->id }}">{{ $player->getFullName($player->id) }}</a><br>
                </td>
                <td>
                    {{ $player->lessonhours->count('players') }}
                </td>
            </tr>
            @endforeach
           </tbody>
       </table>        
    @endif
    {{ $players->links() }}
    </article>
    </section>
    </div>
    <div class="col-md-4 col-sm-5"></div>
    
</div>

@endsection

<script type="text/javascript" src="/src/js/script.js"></script>