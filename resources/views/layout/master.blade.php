<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!--LIGHTBOX-->
  <link href="{{asset('css/lightbox.css')}}" rel="stylesheet" />
    
    <!-- alert toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

   <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.css')}}">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">


    <!-- Modal css only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- DATATABLE EXTENTIONS-->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
  
    <!-- DataTables ADMINLTE -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <link  href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css' rel='stylesheet' />

     <!-- CALENDAR -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" /> -->
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> -->
     
    
    <link rel="stylesheet" href="{{asset('css/service.css')}}">

     <!-- ASSOCIATE -->
    <link rel="stylesheet" href="{{asset('css/assoc_edit_client.css')}}">
    
    <!--<link rel="stylesheet" href="{{asset('css/register.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/assoc_message.css')}}">
    <!-- CLIENT -->
    <!-- <link rel="stylesheet" href="{{asset('css/client_profile.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/c_peofile.css')}}"> -->

    <!-- ADMIN -->
    <link rel="stylesheet" href="{{asset('css/admin_login.css')}}">
   

  
    <link rel="stylesheet" href="{{asset('css/guest_list.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_add_assoc.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_assoc_list.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_edit_assoc.css')}}">
 
     <!-- Calendar -->
     <link href="{{asset('css/main.css')}}" rel='stylesheet' />
     <link rel="stylesheet" href="{{asset('css/admin_calendar.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/admin_msg_assoc.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_show_msg.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/admin_msg.css')}}"> -->
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Datatable-->
    <!-- <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}"> -->
    
   
</head>
<body>

    <!-- Page Wrapper -->
    <div class="wrapper">
      @include('shared.navbar')

        @if (Auth::user()->role=='admin')
          @include('pages.admin.sidebar')
    
        @elseif (Auth::user()->role=='associate')
          @include('pages.associate.sidebar')
    
        @else (Auth::user()->role=='client' )
          @include('pages.client.sidebar')
        @endif

      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          @yield('content')
        </div>
    </div>
    <!-- ./wrapper -->
    
    


    <script src="https://your-site-or-cdn.com/fontawesome/v5.15.4/js/all.js" data-auto-a11y="true" ></script> <!-- used font awesome -->
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script  src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- alert toaster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>
    <!-- AdminLTE App -->
    <script defer src="{{asset('dist/js/adminlte.min.js')}}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script defer src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- fullcalendar -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/fullcalendar/main.js')}}"></script>
    <!-- AdminLTE App -->
    <!-- <script src="../../dist/js/adminlte.min.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
    <!-- page script -->
   



<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>

  

       <!-- CALENDAR -->
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script> --}}
    <script defer src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script defer src= "https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
     <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--LIGHTBOX-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{asset('js/lightbox.js')}}"></script>
    
    <script src="{{asset('js/admin_assoc_list.js')}}"></script>
    
    <script src="{{asset('js/admin_add_assoc.js')}}"></script>
    <script src="{{asset('js/admin_edit_assoc.js')}}"></script>
    <script src="{{asset('js/admin_notification.js')}}"></script>
    <script src="{{asset('js/admin_assolist_checkbox.js')}}"></script>
    <script src="{{asset('js/associate_profile.js')}}"></script>

    <script  src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
   
    <!-- DataTable CRUD Script -->
    
    <script src="{{asset('js/associate_clientlist.js')}}"></script>
    <script  src="{{asset('js/associate_addClient.js')}}"></script>
    <script src="{{asset('js/associate_addfile.js')}}"></script>
 
     <!-- Calendar  -->
    
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}

    <!--messaging -->
    <script src="{{asset('js/assoc_messaging.js')}}"></script>
    @yield('scripts')

</body>
</html>