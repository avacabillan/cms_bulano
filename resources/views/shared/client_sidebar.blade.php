
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
              <a href="{{route('dashboard')}}"><i class="fa fa-book position-relative"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <!-- REGISTERED GUEST -->
          
            <!-- ASSOCIATES -->
            <li>
              <a href="{{route('associates_list')}}">
                <i class="fa fa-globe"></i><span>My Associate</span>
              </a>
            </li>
           
            <!-- EXTRA -->
            <li class="header-menu"><span>Extra</span></li>
            
            <li><a href="{{route('about')}}"><i class="far fa-envelope"></i>Message<span class="badge pull-right bg-danger me-3 mt-2">3</span></a></li>
            <li><a href="{{route('about')}}"><i class="fa fa-book"></i><span>About</span></a></li>
            <li><a href="{{route('services')}}"><i class="fa fa-calendar"></i><span>Services</span></a></li>
            <li><a href=""><i class="fa fa-folder"></i><span>Conatcs</span></a></li>
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
          <i class="fa fa-power-off"></i>
        </a>
      </div>
      <!-- END OF FOOTER -->

    </div>
    <!-- END OF SIDEBAR CONTENT -->

  </div>   
</div>
