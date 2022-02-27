
          
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
          <a href="{{route('client_profile', Auth::user()->clients->id)}}" data-bs-toggle="tooltip" data-bs-placement="right" title="View Profile" class="d-block">{{Auth::user()->clients->company_name}}</a>
          <span class="user-role text-white">{{Auth::user()->role}}</span>
        </div>
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
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('my_associate')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                My Associate
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('client_message')}}" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Message
                <span class="right badge badge-danger"></span>
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
        {{-- <div class="sidebar-footer">
          <a href="{{'logout'}}">
            <i class="fal fa-sign-out-alt"></i>
          </a>
          <a href="#">
            <i class="fa fa-power-off"></i>
          </a>
        </div><!-- sidebar-footer  --> --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>