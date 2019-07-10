<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <title>ZOE</title>
    <meta name="description" content="ucorpora demo - Free Business Corporate HTML Template">
    <meta name="keywords" content="ucorpora, ucorpora demo, free, template, corporate, clean, modern, bootstrap, creative, design">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if (gte IE 9)|!(IE)]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <![endif]-->

    <!-- Favicon -->
    <link href="{{ asset('assets/front/img/favicon.ico') }}" rel="icon" type="image/png">

    <!-- Styles -->
    <link href="{{ asset('assets/front/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/bootstrap-override.css') }}" rel="stylesheet">

    <!-- Font Avesome Styles -->
    <link href="{{ asset('assets/front/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <!--[if IE 7]>
    <link href="{{ asset('assets/front/css/font-awesome/font-awesome-ie7.min.css') }}" rel="stylesheet">
    <![endif]-->

    <!-- FlexSlider Style -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/flexslider.css') }}" type="text/css" media="screen">

    <!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<!-- Header -->
<header id="header">
    <div class="container">
        @include('layouts.front.partial.header')
    </div>
</header>
<!-- Header End -->
<!-- Content -->
<!-- Titlebar
================================================== -->
<section id="titlebar">
    <!-- Container -->
    <div class="container">

        <div class="eight columns">
            <h3 class="left">Espèces</h3>
        </div>

        <div class="eight columns">
            <nav id="breadcrumbs">
                <ul>
                    <li>Vous êtes ici:</li>
                    <li><a href="#">Acceuil</a></li>
                    <li>Espèces</li>
                </ul>
            </nav>
        </div>

    </div>
    <!-- Container / End -->
</section>

<!-- Content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

            </div>

            <div class="span9">

                <!-- Blog Item -->

                    <div class="row">
                        <div class="span1">

                        </div>
                        <div class="span8">
                            <a href=""><h3>{{ $espece->name }}</h3></a>

                            <a href="{{ route('espece', $espece->slug) }}"><img src="{{ Storage::disk('public')->url('espece/'.$espece->image) }}" alt=""></a>

                            <div class="row">
                                <div class="span8 post-d-info">

                                    <p>
                                        {!! $espece->description !!}
                                    </p>
                                    <div class="blue-dark">
                                        <i class="icon-user"></i> By {{ $espece->user->nom }}  |  <i class="icon-comment-alt"></i>  12
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Blog Item End -->

                    <div class="row space40"></div>




                <div class="row space40"></div>

            </div>

            <!-- Side Bar -->
            <div class="span3">


                <h3>Taximonie</h3>

                    <div class="progress">
                      <div class="bar" style="width: 100%;">regne:  {{ $espece->regne }}</div>
                    </div>
                    <div class="progress">
                        <div class="bar" style="width: 100%;">
                            Embranchement :  @foreach($espece->embranchements as $embranchement)
                                {{ $embranchement->name }}
                            @endforeach
                        </div>
                    </div>

                <div class="progress">
                    <div class="bar" style="width: 100%;">
                        Classe : @foreach($espece->classes as $classe)
                            {{ $classe->name }}
                        @endforeach
                    </div>
                </div>

                <div class="progress">
                    <div class="bar" style="width: 100%;">
                        Ordre : @foreach($espece->ordres as $ordre)
                            {{ $ordre->name }}
                        @endforeach
                    </div>
                </div>

                <div class="progress">
                    <div class="bar" style="width: 100%;">
                        Famille : @foreach($espece->familles as $famille)
                            {{ $famille->name }}
                        @endforeach
                    </div>
                </div>

                <div class="progress">
                    <div class="bar" style="width: 100%;">
                        Genre : @foreach($espece->genres as $genre)
                            {{ $genre->name }}
                        @endforeach
                    </div>
                </div>


                <div class="row space50"></div>
            </div>
        </div>
    </div>
</div>
<!-- Content End -->
<!-- Content End -->

<!-- Footer -->
@include('layouts.front.partial.footer')
<!-- Footer End -->

<!-- JavaScripts -->
<script type="text/javascript" src="{{ asset('assets/front/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/functions.js') }}"></script>
<script type="text/javascript" defer src="{{ asset('assets/front/js/jquery.flexslider.js') }}"></script>

</body>
</html>
