<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/about.css')}}">
    <link rel="stylesheet" href="{{asset('css/service.css')}}">

    <!-- ADMIN -->
    <link rel="stylesheet" href="{{asset('css/admin_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/guest_list.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_add_assoc.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_assoc_list.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_show_msg.css')}}">
    <link rel="stylesheet" href="{{asset('css/system/admin_msg.css')}}">
    

    <!-- ASSOCIATE -->
    <link rel="stylesheet" href="{{asset('css/associate_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/system/assoc_edit_client.css')}}">
    <link rel="stylesheet" href="{{asset('css/assoc_profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/assoc_add_client.css')}}">
    <!--<link rel="stylesheet" href="{{asset('css/assoc_message.css')}}">
    <link rel="stylesheet" href="{{asset('css/register.css')}}"> -->

    <!-- CLIENT -->
    <link rel="stylesheet" href="{{asset('css/client_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/client_profile.css')}}">
    
    @livewireStyles
</head>
<body>
    @yield('content')
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- used font awesome -->

    <!-- ADMIN -->
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
    <script src="{{asset('js/admin_assoc_list.js')}}"></script>
    <script src="{{asset('js/admin_add_assoc.js')}}"></script>
    <script src="{{asset('js/admin_notification.js')}}"></script>
    <script src="{{asset('js/admin_assolist_checkbox.js')}}"></script>
    <script src="{{asset('js/associate_profile.js')}}"></script>
    
    <!-- ASSOCIATE -->
    

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

    <script src="{{asset('js/associate_addClient.js')}}"></script>

  
    @yield('scripts')

    @livewireScripts
    
</body>
</html>