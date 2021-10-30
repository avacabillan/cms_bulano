
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
            <span class="user-name text-white">Irish Bulano</span>
            <span class="user-role">Head Administrator</span>
          </div>
        </div>
        <!-- END OF SIDEBAR HEADER -->

        <!-- SIDEBAR MENU -->
   
        <div class="sidebar-menu">

          <ul>
            <li class="header-menu"><span>General</span></li>
            
            <!-- DASHBOARD -->
            <li>
              <a href="#"><i class="fa fa-book position-relative"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <!-- END OF DASHBOARD -->
            <!-- REGISTERED GUEST -->
            <li>
              <a href="#">
                <i class="fa fa-user"></i><span>Registered Guest</span>
              </a>
            </li>
            <!-- END OF REGISTERED GUEST -->
            <!-- ASSOCIATES -->
            <li>
              <a href="{{route('associate.index')}}">
                <i class="fa fa-globe"></i><span>Associates</span>
              </a>
            </li>
            <!-- END OF ASSOCIATES -->
            <!-- CLIENTS -->
            <li>
              <a href="{{route('clients.list')}}">
                <i class="fa fa-globe"></i><span>Clients</span>
              </a>
            </li>
            <!-- END OF CLIENTS -->

            <!-- EXTRA -->
            <li class="header-menu"><span>Extra</span></li>
            <li><a href="#"><i class="fa fa-book"></i><span>About</span><span class="badge badge-pill badge-primary">Beta</span></a></li>
            <li><a href="#"><i class="fa fa-calendar"></i><span>Services</span></a></li>
            <li><a href="#"><i class="fa fa-folder"></i><span>Conatcs</span></a></li>
           
             <!-- END OF EXTRA -->
          </ul>

        </div>
        <!-- END OF SIDEBAR MENU -->

      </div>
      <!-- END OF SIDEBAR HEADER -->

      <!-- FOOTER -->
      <div class="sidebar-footer">
        <a href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification" >3</span>
        </a>
        <a href="#">
          <i class="fa fa-cog"></i>
          <span class="badge-sonar"></span>
        </a>
        <a href="#">
          <i class="fa fa-power-off"></i>
        </a>
      </div>
      <!-- END OF FOOTER -->

    </div>
    <!-- END OF SIDEBAR CONTENT -->

  </div>   
</div>
