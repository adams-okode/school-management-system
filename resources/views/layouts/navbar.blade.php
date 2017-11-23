  
  <header id="topnav">
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/dashboard') }}">
     <img src="{{ asset('images/logo.png')}}" height="60" alt="logo" style="margin-top: -8px;">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav nav-center">
        <li><a href="{{ url('/dashboard') }}" class="text-center">Dashboard</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="javascript:void(0)">HR Management</a></li>
            <li><a href="javascript:void(0)">Hostel Services</a></li>
            <li><a href="javascript:void(0)">Asset Management</a></li>
            <li><a href="javascript:void(0)">Transport Services</a></li>
            <li><a href="javascript:void(0)">Cafeteria Services</a></li>
            <li><a href="javascript:void(0)">Clinical Services</a></li>
            <li><a href="javascript:void(0)">Gallery</a></li>
       
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Finance<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/finance') }}">Accounts</a></li>
            <li><a href="javascript:void(0)">Procurement</a></li>
            <li><a href="{{ url('/pos') }}">Point Of Sale</a></li>
          </ul>
        </li>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students Management<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('students')}}">Students</a></li>
            <li><a href="{{ url('studentacademics')}}">Student Academics</a></li>
            <li><a href="{{ url('academics/index')}}">Academics</a></li>
            <li><a href="javascript:void(0)">Timetable</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Knowledge Management<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="">E-Library</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('settings/users') }}">Users</a></li>
            <li><a href="{{ url('settings/academics') }}">Academics</a></li>

          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
                <a href="#" class="dropdown-toggle waves-effect profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('images/users/'.Auth::user()->avatar) }}" alt="user-img" class="img-circle" height="40" width="40"> </a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li class="text-center">
                                        <h5>Hi, {{ Auth::user()->name }}</h5>
                                    </li>
                                    <li><a href="{{ url('/profile') }}"><i class="dripicons-user m-r-10"></i> Profile</a></li>
                                       <li>
                        <a  href="{{ route('signout') }}"><i class="dripicons-power m-r-10"></i> Logout</a>
                        </li>
                                </ul>

                            </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
     
        </header>