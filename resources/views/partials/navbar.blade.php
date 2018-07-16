<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand">Politeknik</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>
 Home <span class="sr-only">(current)</span></a></li>
      <li><a href="{{ url('contact') }}">Developer</a></li>
      <li><a href="{{ url('pustakawan') }}">Sirkulasi</a></li>
    </ul>
    @if (Route::has('login'))
    <ul class="nav navbar-nav navbar-right">
      @if (Auth::guard('admin_user')->user())
        @include('layouts.admin-dropdown')
      @elseif(Auth::guard('staff_user')->user())
        @include('layouts.staff-dropdown')
      @elseif(! Auth::guest())
        @include('layouts.dropdown')
      @else
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management <span class="caret"></span></a>
            <ul style="background: rgb(66, 66, 63);" class="dropdown-menu">
              <li class="li-login"><a style="color:#fff;" href="{{ url('login') }}" class="menu-list" onMouseOver="this.style.color='#337ab7'"
   onMouseOut="this.style.color='#fff'">Login Member</a></li>
              <div style="background:#337ab7;" class="divider"></div>
              <li class="li-login"><a style="color:#fff;" href="{{ url('staff_user') }}" class="menu-list" onMouseOver="this.style.color='#337ab7'"
   onMouseOut="this.style.color='#fff'">Login Sirkulasi</a></li>
            </ul>
          </li>
          {{-- <li><a href="{{ url('register') }}">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a></li> --}}
        </ul>
      @endif
    </ul>
    @endif
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
