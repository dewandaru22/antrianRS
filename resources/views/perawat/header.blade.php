 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span> Halo, {{DB::table('users')->where('id','=', Auth::user()->id)->value('name')}} </span>
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">{{DB::table('users')->where('id','=', Auth::user()->id)->value('name')}}</span>
          <div class="dropdown-divider"></div>
          <a href="{{ url('/profilePerawat') }}" class="dropdown-item">
            <i class="fas fa-edit"></i> Profile
          </a>
          <a href="{{ url('/landing') }}" class="nav-link btn-login; dropdown-item"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Keluar 
          </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->