 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gadget News</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="info">
          <a href="#" class="d-block text-uppercase"> {{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/posts" class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                My Post
              </p>
            </a>
          </li>
          <li class="nav-header">Back To Daftar HP</li>
          <li class="nav-item">
            <a href="/daftarHp" class="nav-link">
              <i class="nav-icon fas fa-backward"></i>
              <p>
                Back
              </p>
            </a>
          </li>
        </ul>
        @can('admin')
        <ul  class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">ADMINISTRATOR</li>
          <li class="nav-item">
            <a href="/dashboard/categories" class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-icons"></i>
              <p>
                Post Categories
                <span class="right badge badge-danger">Admin</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/hp" class="nav-link {{ Request::is('dashboard/hp*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-icons"></i>
              <p>
                Post Hp
                <span class="right badge badge-danger">Admin</span>
              </p>
            </a>
          </li>
        </ul>
        @endcan
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>