<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 03/07/19
 * Time: 16:46
 */
?>

        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>ZOE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>

<body>
    <!-- header -->
    @include('layouts.frontend.partial.header')
    <!-- #header -->

    <!-- header -->
    @include('layouts.frontend.partial.menu')
    <!-- #header -->


    <section class="hero-wrap hero-wrap-2" style="background-image: url{{ asset('assets/frontend/images/el.png') }};" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Taximonie</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil<i class="ion-ios-arrow-forward"></i></a></span> <span>Taximonie <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section bg-light">
        <div class="container">
           <div class="row">
               @foreach($especes as $key=>$espece)
                   <div class="col-md-4 ftco-animate">
                       <div class="blog-entry">
                           <a href="{{ route('espece', $espece->slug) }}" class="block-20" style="background-image: url({{ Storage::disk('public')->url('espece/'.$espece->image) }});">
                               <div class="meta-date text-center p-2">
                                   <span class="day">23</span>
                                   <span class="mos">January</span>
                                   <span class="yr">2019</span>
                               </div>
                           </a>
                           <div class="text bg-white p-4">
                               <h3 class="heading"><a href="#">{{ $espece->name }}</a></h3>
                               <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                               <div class="d-flex align-items-center mt-4">
                                   <p class="mb-0"><a href="#" class="btn btn-primary">Lire plus <span class="ion-ios-arrow-round-forward"></span></a></p>
                                   <p class="ml-auto mb-0">
                                       <a href="#" class="mr-2">{{ $espece->user->nom }}</a>
                                       <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                   </p>
                               </div>
                           </div>
                       </div>
                       </div>

               @endforeach
           </div>
            <div class="row no-gutters my-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets/frontend/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>