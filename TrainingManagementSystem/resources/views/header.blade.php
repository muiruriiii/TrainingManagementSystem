<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('path/to/font-awesome/css/font-awesome.min.css') }}" />


    <title>TMS</title>

</head>
<body>


<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>



<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">

            <div class="col-3">
                <div class="site-logo">
                    <a href="" style="color: rgb(160,82,45);" class="font-weight-bold">TMS</a>
                </div>
            </div>
            <div class="col-9  text-right">
                <span class="d-inline-block d-lg-none"><a href="#" class="text-primary site-menu-toggle js-menu-toggle py-5">
                        <span class="icon-menu h3 text-white"></span></a></span>
            <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                    <li class="active"><a style="color: rgb(160,82,45);" href="#" class="font-weight-bold">Home</a></li>
                    <li><a href="{{URL::to('about')}}" class="nav-link">About</a></li>
                    <li><a href="#" class="nav-link">Services</a></li>
                    <li><a href="#" class="nav-link">Contact</a></li>
                    <li><a href="{{URL::to('login')}}" class="nav-link">Account</a></li>
                    <li><a href="{{URL::to('logout')}}" class="nav-link">Logout</a></li>
                </ul>
            </nav>
            </div>
            <i class="fa fa-user" aria-hidden="true"></i>
           @if(Auth::check())
            <b style="color:#fff;margin-left:10px;">{{ Auth::user()->firstName." ".Auth::user()->lastName}}</b>
            @endif
        </div>
    </div>


</header>
