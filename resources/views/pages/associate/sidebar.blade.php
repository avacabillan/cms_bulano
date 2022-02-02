

         
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/bulano.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="user-info">
            <span class="user-name text-white">{{Auth::user()->associate->name}}</span>
            <span class="user-role">{{Auth::user()->(roles)}}</span>
          </div>
        <!-- END OF SIDEBAR HEADER -->

        <!-- SIDEBAR MENU -->
   
        <div class="sidebar-menu">

          <ul>
            <li class="header-menu"><span>General</span></li>
            
            <!-- DASHBOARD -->
            <li>
              <a href="{{route('dashboard')}}"><i class="fa fa-book position-relative"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <!-- CLIENTS -->
            <li>
              <a href="{{route('assoc-clients-list')}}">
                <i class="fa fa-globe"></i><span>Clients</span><span class="badge pull-right bg-danger me-3 mt-2"></span></a></li>
              </a>
            </li>
            <!-- ARCHIVE -->
            <li>
              <a href="{{route('archive-list')}}">
                <i class="fa fa-globe"></i><span>Archive</span>
              </a>
            </li>
            <!-- EXTRA -->
            <li class="header-menu"><span>Extra</span></li>
            
            <li><a href="{{route('associate_messages')}}"><i class="far fa-envelope"></i>Message<span class="badge rounded-pill pull-right bg-danger ms-2 mt-2">5</span></a></li>
            <li><a href="{{route('about')}}"><i class="fa fa-book"></i><span>About</span></a></li>
            <li><a href="{{route('services')}}"><i class="fa fa-calendar"></i><span>Services</span></a></li>
            <li><a href=""><i class="fa fa-folder"></i><span>Contacts</span></a></li>
          </ul>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fad fa-users"></i>
              <p>
              Clients
                <span class="right badge badge-danger">13</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin-archive-list')}}" class="nav-link">
              <i class="nav-icon fal fa-archive"></i>
              <p>
              Archive
                <span class="right badge badge-danger">13</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('associate_messages')}}" class="nav-link">
              <i class="nav-icon fal fa-archive"></i>
              <p>
              Message
                <span class="right badge badge-danger">13</span>
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
    <!-- FOOTER -->
    <div class="sidebar-footer">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span class="badge-sonar"></span>
        </a>
        <a href="{{'logout'}}">
          <i class="fal fa-sign-out-alt"></i>
        </a>
      </div>
      <!-- END OF FOOTER -->
  </aside>