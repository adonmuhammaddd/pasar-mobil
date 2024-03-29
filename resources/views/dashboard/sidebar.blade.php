<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PasarMobil</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{ asset("img/avatar.jpg") }} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href={{ route('dashboard') }} class="nav-link {{ Request::segment(1) == 'dashboard' || Request::segment(1) == '' ? 'active' : '' }}" >
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('customer') }} class="nav-link {{ Request::segment(1) == 'customer' || Request::segment(1) == '' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Customers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('car') }} class="nav-link {{ Request::segment(1) == 'car' || Request::segment(1) == '' ? 'active' : '' }}">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Cars
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('stock') }} class="nav-link {{ Request::segment(1) == 'stock' || Request::segment(1) == '' ? 'active' : '' }}">
              <i class="nav-icon fas fa-thumbtack"></i>
              <p>
                Stock
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('category') }} class="nav-link {{ Request::segment(1) == 'category' || Request::segment(1) == '' ? 'active' : '' }}">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('supplier') }} class="nav-link {{ Request::segment(1) == 'supplier' || Request::segment(1) == '' ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>