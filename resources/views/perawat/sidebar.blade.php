<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">
        <img class="navbar-brand-full" src="{{('/template/images/rs-islam-logo.png')}}" width="150" height="40" alt="rsiy logo" href="/awal" style="display:block; margin-left:auto; margin-right:auto;">
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block" style="margin: 0 0 0 10px;">PERAWAT</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/perawat" class="nav-link {{ Request::segment(1) === 'perawat' ? 'nav-link active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Antrian
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>