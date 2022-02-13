<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/bulano.png" class="img-circle elevation-2" alt="User Image">
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
          <!-- <li class="nav-item">
            <a href="{{route('requestee')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Registered Guest
                <span class="right badge badge-info">{{$reqs}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('bir-calendar')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              BIR Calendar
                <span class="right badge badge-danger">{{$birs}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('display-calendar')}}" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
              Reminder Calendar
                <span class="right badge badge-info">{{$ddlines}}</span>
              </p>
            </a>
          </li> -->
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
        <div class="sidebar-footer">
          <a href="{{'logout'}}">
            <i class="fal fa-sign-out-alt"></i>
          </a>
          <a href="#">
            <i class="fa fa-power-off"></i>
          </a>
        </div><!-- sidebar-footer  -->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>