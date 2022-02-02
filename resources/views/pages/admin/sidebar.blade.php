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
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          <span class="user-role text-white">{{Auth::user()->roles()->first()->display_name}}</span>

<div class="siderbar_main toggled">
  <div id="sidebar" class="sidebar-wrapper">

    <!-- SIDEBABAR CONTENT -->
    <div class="sidebar-content">

      <!-- SIDEBAR HEADER -->
      <div class="sidebar-header">
      
          <div class="user-pic">
            <img class="img-responsive img-rounded" src="images/bulano.png" alt="User picture">
          </div>
          <div class="user-info">
            
          </div>
        </div>
        <!-- END OF SIDEBAR HEADER -->

        <!-- SIDEBAR MENU -->
   
        <div class="sidebar-menu">

          <ul>
            <li class="header-menu"><span>General</span></li>
            
            <!-- DASHBOARD -->
            <li>
              <a href=""><i class="fa fa-book position-relative"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <!-- REGISTERED GUEST -->
            <li>
              <a href="{{route('requestee')}}">
                <i class="fa fa-user"></i><span>Registered Guest</span><span class="badge pull-right bg-danger ms-2 mt-2">NEW</span>
              </a>
            </li>
            <!-- CALENDAR -->
            <li>
              <a href="{{route('bir-calendar')}}" >
                <i class="fa fa-calendar" ></i><span>BIR Calendar</span><span class="badge pull-right bg-danger me-3 mt-2"></span>
              </a>
            </li>
            <li>
              <a href="{{route('display-calendar')}}" >
                <i class="fa fa-calendar" ></i><span>Reminder Calendar</span><span class="badge pull-right bg-danger me-3 mt-2"></span>
              </a>
            </li>
         
            <li>
              <a href="{{route('assoc_table')}}">
                <i class="fa fa-globe"></i><span>Associates</span>
              </a>
            </li>
            <!-- CLIENTS -->
            <li>
              <a href="{{route('admin-clients-list')}}">
                <i class="fa fa-globe"></i><span>Clients</span>
              </a>
            </li>
            <!-- ARCHIVE -->
            <li>
              <a href="{{route('admin-archive-list')}}">
                <i class="fa fa-globe"></i><span>Archive</span>
              </a>
            </li>
            <!-- EXTRA -->
            <li class="header-menu"><span>Extra</span></li>
            
            <li><a href="{{route('admin_messages')}}"><i class="far fa-envelope"></i>Message<span class="badge rounded-pill pull-right bg-danger ms-2 mt-2">99+</span></a></li>
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
            <a href="{{route('requesters')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Registered Guest
                <span class="right badge badge-info">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('fullcalendar')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              BIR Calendar
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('display-calendar')}}" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
              Reminder Calendar
                <span class="right badge badge-info">13</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('assoc_table')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
              Associates
                <span class="right badge badge-danger">13</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin-clients-list')}}" class="nav-link">
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