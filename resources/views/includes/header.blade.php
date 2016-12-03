<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="{{ url('/home') }}"><image src="{{ URL::asset('src/img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" height="42px"></image></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
         @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else 
            <li><a href="#">{{ Auth::user()->email }}</a></li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="true">View <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('myfamilyprofile') }}">Family Profile</a></li>
            <li><a href="{{ url('mylessonhours') }}">Lesson Hours</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('dashboard') }}">Admin</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>