<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a id="sentuh" href="{{ url('/') }}" class="navbar-brand">Politeknik</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    @if (Route::has('login'))
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a id="aktif" href="{{ url('home') }}">Beranda<span style="font-size:16px;" class="pull-right fa fa-home" aria-hidden="true"></span></a></li>

        @if (Auth::guard('admin_user')->user())
          <li ><a id="sentuh" href="{{ route('staff.index') }}">Daftar Sirkulasi <i class="fa fa-user-circle pull-right" aria-hidden="true"></i></a></li>
        @elseif (Auth::guard('staff_user')->user())
          <li ><a id="sentuh" href="{{ url('/staff/edit_staff') }}">Profile <span style="font-size:16px;" class="pull-right fa fa-user-circle" aria-hidden="true"></span></a></li>
        @elseif (Auth::guard()->user())
          <li ><a id="sentuh" href="{{ url('user-profile') }}">Profile <span style="font-size:16px;" class="pull-right fa fa-user" aria-hidden="true"></span></a></li>
        @else
          <li ><a id="sentuh" href="{{ url('pustakawan-home') }}">Sirkulasi <span style="font-size:16px;" class="pull-right fa fa-user" aria-hidden="true"></span></a></li>
        @endif



    {{-- Dropdown User Authenticated --}}
      @if (Auth::guard('admin_user')->user() || Auth::guard('staff_user')->user())
        {{-- Copy Dibawah Ini --}}
        @if (Auth::guard('admin_user')->user())
          <li><a id="sentuh" href="{{ route('user.index') }}">Daftar Member <i class="fa fa-users pull-right" aria-hidden="true"></i></a></li>
          <li><a id="sentuh" href="{{ route('admin_buku.index') }}">Daftar Buku <span style="font-size:16px;" class="pull-right fa fa-book" aria-hidden="true"></span></a></li>
        @endif


        @if (Auth::guard('staff_user')->user())
          <li><a id="sentuh" href="{{ url('/buku') }}">Daftar Buku <span style="font-size:16px;" class="pull-right fa fa-book" aria-hidden="true"></span></a></li>
          <li><a id="sentuh" href="{{ url('/staff/create/mode-input') }}">Member Pinjaman <span style="font-size:16px;" class="fa fa-address-book-o pull-right" aria-hidden="true"></span></a></li>
        @endif

        {{-- ICON SEMENTARA : ADMIN --}}
        @if (Auth::guard('staff_user')->user())
            <li class="dropdown">
              <a class="dropdown-toggle" id="sentuh" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::guard('staff_user')->user()->name }} <span class="caret"></span> <span style="font-size:16px;" class="pull-right fa fa-user-secret" aria-hidden="true"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a id="sentuh" href="{{ url('staff_logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Keluar
                      </a>

                      <form id="logout-form" action="{{ url('staff_logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>

        {{-- Ending Authenticate Staff --}}
        @elseif(Auth::guard('admin_user')->user())
          <li class="dropdown">
              <a class="dropdown-toggle" id="sentuh" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::guard('admin_user')->user()->name }} <span class="caret"></span> <span style="font-size:16px;" class="pull-right fa fa-user-secret" aria-hidden="true"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a id="sentuh" href="{{ url('admin_logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Keluar
                      </a>

                      <form id="logout-form" action="{{ url('admin_logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
        {{-- Ending Authenticate Staff --}}
        @endif




      {{-- Opening Authenticate User --}}
      @elseif(! Auth::guest())
        {{-- ICON SEMENTARA : BUKU --}}
        <li class="dropdown">
            <a class="dropdown-toggle" id="sentuh" data-toggle="dropdown" role="button" aria-expanded="false">
                Buku <span class="caret"></span> <span style="font-size:16px;" class="pull-right fa fa-book" aria-hidden="true"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li><a id="sentuh" href="{{ url('buku') }}">Daftar Buku</a></li>
              <div class="divider"></div>
              <li><a id="sentuh" href="{{ url('pinjam') }}">Daftar Pinjaman</a></li>
            </ul>
        </li>
        {{-- Ending Authenticate User --}}

        {{-- Opening Authenticate User --}}

        <li class="dropdown">
          {{-- ICON SEMENTARA : USER --}}
            <a class="dropdown-toggle" id="sentuh" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span> <span style="font-size:16px;" class="pull-right fa fa-user" aria-hidden="true"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a id="sentuh" href="{{ url('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Keluar
                    </a>

                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
      @else
        <li>
            <a id="sentuh" href="/buku">
                Buku<span style="font-size:16px;" class="pull-right fa fa-book" aria-hidden="true"></span>
            </a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" id="sentuh" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management <span class="caret"></span></a>
          <ul style="background: rgb(66, 66, 63);" class="dropdown-menu">
            <li><a style="color:#9d9d9d;" href="{{ url('login') }}" class="menu-list" onMouseOver="this.style.color='#337ab7'"
              onMouseOut="this.style.color='#9d9d9d'">Login Member</a></li>
            <div style="background:#337ab7;" class="divider"></div>
            <li><a style="color:#9d9d9d;" href="{{ url('staff_login') }}" class="menu-list" onMouseOver="this.style.color='#337ab7'"
              onMouseOut="this.style.color='#9d9d9d'">Login Sirkulasi</a></li>
          </ul>
        </li>
      @endif
    {{-- End Dropdown User Authenticated --}}

      </ul>
    </div>
  @endif

  </div>
</nav>
