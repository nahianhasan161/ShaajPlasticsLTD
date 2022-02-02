<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('img/logo/logo-sm.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold text-primary" style="font-family: Xavier  ;  font-size: small;">Shaaj Plastics LTD</span>
    </a>
    {{-- brand-text font-weight-bold text-primary --}}
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="{{route('admin.dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.order.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.order.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
                </a>
              </li>

            </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
             Deliveries
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.delivery.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create New Delivery</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.delivery.all')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Deliveries</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
                Products
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('admin.inventory.products')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Produced Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.inventory.product.category')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.inventory.plastic.products')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Plastic Product</p>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
                Inventory
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.inventory.row_meterial')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Row Metarial</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.inventory.product.category')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Category</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.inventory.production')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Production</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Employees
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/forms/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create New Employee</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/advanced.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Emoloyees</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.users')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Managment</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-header">PARTIALS</li>
        <li class="nav-item">
          <a href="{{route('admin.company')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Company
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.via')}}" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              VIA
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.request')}}" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Requests
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.invoice')}}" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Custom Invoice
            </p>
          </a>
        </li>


      </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
