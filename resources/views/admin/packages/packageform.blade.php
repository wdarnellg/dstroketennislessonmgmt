@extends('layouts.admin-master')

@section('title')
    Lesson Packages
@endsection

@section('content')
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4">
        @include('includes.info-box')
            <section>
                <h4>D`Stroke Tennis Administrator</h4>
            <article>
            
            <h3>Packages</h3>
            <ul class="list-group">
                @foreach($packages as $package)
                    <li class="list-group-item">
                      Package: {{ $package->name }}<br>
                      Number of Hours: {{ $package->numberofhours }}<br>
                      <a href="/packageform/{{ $package->id }}/packageedit" class="btn btn-default btn- pull-right">
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                                       Edit {{ $package->name }}</a>
                      Type: {{ $package->type }}<br>
                      Cost: ${{ $package->cost }}.00
                   </li>
                @endforeach
             </ul>
             {{ $packages->links() }}
    </article>
    </section>
    </div>
    <div class="col-md-4">
        <div class="row">
            <h3>Create Lesson Packages Form</h3>
        </div>
        <form role="form" action="packageform" method="post">
            <div class="row">
            <div class="form-group">
                <label for="name">Package Name:</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Package Name"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group" >
                <label for="cost">Cost:</label>
                <input class="form-control" type="text" name="cost" id="cost" placeholder="Cost"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="cost">Number of Hours:</label>
                <input class="form-control" type="text" name="numberofhours" id="numberofhours" placeholder="Number of Hours"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="gender">Type:</label>
                <select class="form-control" name="type" id="type">
                  <option selected>Package Type</option>
                  <option value="Private">Private</option>
                  <option value="Semi-Private">Semi-Private</option>
                  <option value="Group">Group</option>
                </select>
            </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-default">Create Package</button>
                <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            </div>
            </div>
                    
        </form>
    </div>
    <div class="col-md-4"></div>
    </div>
@endsection