<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
 <!-- DATATABLE EXTENTIONS-->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.2.2/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->

    
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="{{asset('css/about.css')}}">
    <link rel="stylesheet" href="{{asset('css/service.css')}}">

    <!-- ADMIN -->
    <link rel="stylesheet" href="{{asset('css/admin_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_calendar.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/guest_list.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_add_assoc.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_assoc_list.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_edit_assoc.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/admin_msg_assoc.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_show_msg.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/admin_msg.css')}}"> -->
    

    <!-- ASSOCIATE -->
    <link rel="stylesheet" href="{{asset('css/associate_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/assoc_edit_client.css')}}">
    <link rel="stylesheet" href="{{asset('css/assoc_profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/assoc_add_client.css')}}">
    <!--<link rel="stylesheet" href="{{asset('css/assoc_message.css')}}">
    <link rel="stylesheet" href="{{asset('css/register.css')}}"> -->

    <!-- CLIENT -->
    <link rel="stylesheet" href="{{asset('css/client_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/client_profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/c_peofile.css')}}">

    <!--Datatable-->
    <!-- <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}"> -->
    
    <!-- CALENDAR -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> -->
    <link  href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css' rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
</head>
<body>
    @yield('content')
    
    <!-- <script defer src="{{asset('js/jquery.min.js')}}"></script> -->
    <!-- <script defer src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->
    <script defer src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- used font awesome -->

     <!-- ASSOCIATE -->
    

    <!-- <script defer src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
    
    <!-- <script defer src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     -->
    <!-- <script  src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script  src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- <script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script  src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
     <!-- CALENDAR -->
     <!-- <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
    <script defer  src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script> -->
    <script defer src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    
    <!-- ADMIN -->
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
    <!-- <script src="{{asset('js/admin_assoc_list.js')}}"></script> -->
    <script src="{{asset('js/admin_calendar.js')}}"></script>
    <script src="{{asset('js/admin_add_assoc.js')}}"></script>
    <script src="{{asset('js/admin_edit_assoc.js')}}"></script>
    <script src="{{asset('js/admin_notification.js')}}"></script>
    <!-- <script src="{{asset('js/admin_assolist_checkbox.js')}}"></script> -->
    <!-- <script src="{{asset('js/associate_profile.js')}}"></script> -->
    
   
    <!-- DataTable CRUD Script -->
    
    <!-- <script src="{{asset('js/associate_clientlist.js')}}"></script>
    <script src="{{asset('js/associate_addClient.js')}}"></script>
    <script src="{{asset('js/associate_addfile.js')}}"></script> -->
    <!-- <script src="{{asset('js/associate_editClient.js')}}"></script> -->
    <!-- <script defer src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script defer src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
     -->

   

    @yield('scripts')

   
   
    
</body>
</html>