<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/bulano.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
        <div class="info">
          <span class="d-block text-light" >{{Auth::user()->name}}</span>
          <span class="user-role text-white">{{Auth::user()->role}}</span>
        </div>
      </div>
      <!-- END OF SIDEBAR HEADER -->

     
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          
            <a href="#" class="nav-link">
              
              <i class="nav-icon fas fa-solid fa-user-shield"></i>
              <p>Admins
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('admin_create')}}" class="nav-link">
              <span> <i class="fas fa-solid fa-user-plus" ></i><p style="margin-left: 12px;">Create New Admin</p> </span>
              </a>
              </li>
              
            
            
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('admin_list')}}" class="nav-link">
              <span> <i class="fas fa-solid fa-user-plus" ></i><p style="margin-left: 12px;">Admin List</p> </span>
              </a>
              </li>

            </ul>
            </li>
        </li>
        <li class="nav-item">
          <a href="{{route('assoc_table')}}" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
            Associates
              <span class="right badge badge-danger">{{$assocs}}</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin-clients-list')}}" class="nav-link">
            <i class="nav-icon fad fa-users"></i>
            <p>
            Clients
              <span class="right badge badge-danger">{{$clients}}</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('client_companies')}}" class="nav-link">
            <i class="nav-icon fas fas-building"></i>
            <p>
              Companies
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('taxforms')}}" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
            Tax Forms
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin-archive-list')}}" class="nav-link">
            <i class="nav-icon fal fa-archive"></i>
            <p>
            Archive
              <span class="right badge badge-danger">{{$archives}}</span>
            </p>
          </a>
        </li>
        
        <li class="nav-header">EXTRA</li>
        <li class="nav-item">
          <a href="{{route('about')}}" class="nav-link">
            <i class="nav-icon fa fa-info"></i>
            <p>
              About
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('services')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Services
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Contacts
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

</aside>