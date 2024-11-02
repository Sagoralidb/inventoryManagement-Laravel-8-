<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name ?? ''}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('brands.index')}}" class="nav-link {{request()->routeIs('brands.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('sizes.index')}}" class="nav-link {{request()->routeIs('sizes.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product-list')}}" class="nav-link {{request()->routeIs('product-list') ? 'active' : ''}}">
                  <i class="fab fa-product-hunt nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('stockIn')}}" class="nav-link {{request()->routeIs('stockIn') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('stockHistory.admin')}}" class="nav-link {{request()->routeIs('stockHistory.admin') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock History</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{route('returnProducts.Admin')}}" class="nav-link {{request()->routeIs('returnProducts.Admin') ? 'active' : ''}}">
                  <i class="fab fa-product-hunt nav-icon"></i>
                  <p>Return Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('returnProductsHistory.admin')}}" class="nav-link {{request()->routeIs('returnProductsHistory.admin') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Return History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{request()->routeIs('users.index') ? 'active' : ''}}">
                    <i class="fas fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                this.closest('form').submit();">
                <i class="nav-icon fas fa-th"></i> {{ __('Logout') }}
                </a>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
