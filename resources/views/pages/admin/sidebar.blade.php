
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
            <span class="user-name text-white">{{Auth::user()->name}}</span>
            <span class="user-role">{{Auth::user()->roles()->first()->display_name}}</span>
          </div>
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
            <!-- REGISTERED GUEST -->
            <li>
              <a href="{{route('requesters')}}">
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
        <!-- END OF SIDEBAR MENU -->

      </div>
      <!-- END OF SIDEBAR HEADER -->

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

    </div>
    <!-- END OF SIDEBAR CONTENT -->

  </div>   
</div>
