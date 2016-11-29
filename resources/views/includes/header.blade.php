<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="{{ url('/home') }}"><image src="{{ URL::asset('src/img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo"></image></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li><a href="#">Home <span class="sr-only">(current)</span></a></li>-->
        <!--<li><a href="#">Family</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
         @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else 
            <li><a href="#">{{ Auth::user()->email }}</a></li>                    
            <li><a href="{{ url('mylessonhours') }}">My Packages</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            <li><a href="{{ url('dashboard') }}">Admin</a></li>
        @endif
        
        
        
       
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>