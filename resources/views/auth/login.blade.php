<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    
    
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

    <script nonce="db65cfe1-726c-406b-98f8-4ccc638bce82"(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0,z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script> 
</head>
 
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>BULANO</b></a>
            </div>
            <div class="card">
                       
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$error}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
        @endif
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Enter Your Email" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter Your Password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">  
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember_me">
                                    <label for="remember">{{ __('Remember me') }}</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-info mt-3 ml-4" type="submit" style="width:5rem;">
                                    {{ __('Login') }}
                                </button>                            
                            </div>
                        </div>

                        <div class="flex items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
               
            </div>
            
                    </form>

                    
                    <p class="mb-0">
                        <a class="text-center" href="{{ route('register')}}" >Register a new membership</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>
</html>
