<?php
use Illuminate\Support\Facades\Auth;
?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />

    <link rel="stylesheet" href="{{ asset('path/to/font-awesome/css/font-awesome.min.css') }}" />


    <title>TMS</title>

</head>
<body>

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
                        <li class="active"><a style="color: rgb(160,82,45);" href="/" class="font-weight-bold">Home</a></li>
                        <li><a href="#about" class="nav-link">About</a></li>
                        <li><a href="#services" class="nav-link">Services</a></li>
                        <li><a href="#contact" class="nav-link">Contact</a></li>
                        <li><a href="{{url('/login')}}" class="nav-link">Account</a></li>
                        <li><a href="{{url('/logout')}}" class="nav-link">Logout</a></li>
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
