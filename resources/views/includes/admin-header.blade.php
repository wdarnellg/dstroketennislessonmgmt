<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"  aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/home') }}"><image src="{{ URL::asset('src/img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" height="42px"></image></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ url('/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a></li>
        <li><a href="{{ url('users') }}">Families</a></li>
            <li><a href="{{ url('packageform') }}">Packages</a></li>
            <li><a href="{{ url('players') }}">Players</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lesson Mgmt <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->email }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>

        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>