<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 09/07/19
 * Time: 17:29
 */
?>

<!-- Header -->
<header id="header">
    <div class="container">
        @include('layouts.front.partial.header')

        <div class="slider1 flexslider">  <!-- Slider -->
            <ul class="slides">
                <li>
                    <img src="{{ asset('assets/front/img/slider/img1.jpg') }}" alt="">
                </li>
                <li>
                    <img src="{{ asset('assets/front/img/slider/img2.jpg') }}" alt="">
                </li>
                <li>
                    <img src="{{ asset('assets/front/img/slider/img3.jpg') }}" alt="">
                </li>

            </ul>
        </div>  <!-- Slider End -->
    </div>
</header>
<!-- Header End -->
