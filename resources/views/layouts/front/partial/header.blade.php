<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 09/07/19
 * Time: 16:44
 */
?>

<div class="row t-container">

    <!-- Logo -->
    <div class="span3">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('assets/front/img/logo-zoe.png') }}" alt="" style="width: 70%; height: 25%"></a>
        </div>
    </div>

    <div class="span9">
        <div class="row space60"></div>
        <nav id="nav" role="navigation">
            <a href="#nav" title="Show navigation">Show navigation</a>
            <a href="#" title="Hide navigation">Hide navigation</a>
            <ul class="clearfix">
                <li class="active"><a href="{{ route('home') }}" title="">Acceuil</a></li>
                <li><a href="{{ route('especes') }}" title="">Taximonie</a></li>
                <li><a href="{{ route('alertes') }}" title="">Alertes</a></li>
                <li><a href="#" title="">Projets de sauvetage</a></li>
                <li><a href="#" title="">Livre du sauvetage</a></li>

            </ul>
        </nav>
    </div>
</div>
