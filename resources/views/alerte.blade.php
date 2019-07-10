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
            <h3 class="left">Alertes</h3>
        </div>

        <div class="eight columns">
            <nav id="breadcrumbs">
                <ul>
                    <li>Vous êtes ici:</li>
                    <li><a href="#">Acceuil</a></li>
                    <li>Alertes</li>
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
                            <a href=""><h3>{{ $alerte->title }}</h3></a>
                            @foreach($alerte->especes as $espece)
                                <a href="{{ route('espece', $espece->slug) }}"><img src="{{ Storage::disk('public')->url('espece/'.$espece->image) }}" alt=""></a>
                            @endforeach

                            <div class="row">
                                <div class="span8 post-d-info">

                                    <p>
                                        {!! $alerte->body !!}
                                    </p>
                                    <div class="blue-dark">
                                        <i class="icon-user"></i> By {{ $alerte->user->nom }}  | <i class="icon-comment-alt"></i>  12
                                    </div>

                                </div>

                            </div>



                                <h3>Candidater</h3>
                                <div>
                                    <form method="POST" action="{{ route('candidature.store') }}" class="form-main">
                                        @csrf

                                        <input name="name" id="name" type="text" placeholder="Entrer votre nom">


                                        <input  name="email" id="email" type="text" placeholder="Entrer votre email">

                                        <input name="alerte" id="alerte" type="text" value="{{ $alerte->title }}">

                                        <textarea  name="body" id="message" placeholder="Saisissez votre candidature"></textarea><br>

                                            <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                    <select name="participation" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected>Participer :</option>
                                                        <option value="Physiquement">Physiquement</option>
                                                        <option value="Physiquement">Financièrement</option>
                                                    </select>
                                                </div>

                                            </div>

                                        <button type="submit" class="btn f-right" >Envoyer la candidature<i class="icon-ok"></i></button>
                                    </form>
                                </div>

                        </div>
                    </div>
                    <!-- Blog Item End -->

                    <div class="row space40"></div>




                <div class="row space40"></div>

            </div>

            <!-- Side Bar -->

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

<script>
    @if($errors->any())

    @forEach($errors->all() as $error)

    toastr.error('{{ $error }}', 'Error', {
        closeButton:true,
        progressBar:true,
    });

    @endforeach
    @endif
</script>


</body>
</html>
