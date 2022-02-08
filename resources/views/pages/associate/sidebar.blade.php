
         
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/bulano.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="user-info pl-2">
            <span class="user-name text-white">{{Auth::user()->associates->name}}</span>
            <p><span class="user-role text-white">{{Auth::user()->role}}</span></p>
          </div>
        <!-- END OF SIDEBAR HEADER -->

       
      </div>

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
            <a href="#" class="nav-link">
              <i class="nav-icon fad fa-users"></i>
              <p>
              Clients
                <span class="right badge badge-danger">13</span>
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{route('assoc-archive-list')}}" class="nav-link">
              <i class="nav-icon fal fa-archive"></i>
              <p>
              Archive
                <!-- <span class="right badge badge-danger">13</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('associate_messages')}}" class="nav-link">
              <i class="nav-icon fal fa-archive"></i>
              <p>
              Message
                <!-- <span class="right badge badge-danger">13</span> -->
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
        <!-- FOOTER -->
    <div class="sidebar-footer fixed-bottom">
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="{{'logout'}}">
        <i class="fal fa-sign-out-alt"></i>
      </a>
    </div>
      <!-- END OF FOOTER -->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    
  </aside>