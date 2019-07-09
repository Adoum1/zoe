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
    <link href="{{ asset('assets/front/img/log-zoe.png') }}" rel="icon" type="image/png">

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
@include('layouts.front.partial.slider')
<!-- Content -->
<div id="content">
    <div class="container">
        <div class="f-center">
            <h2>Qui sommes nous ?</h2>
            <div class="head-info">
               Notre histoire est née il y a 20 ans sur un campus de France de la volonté de quelques amis dépités par l'incapicité de nos gouvernements à prendre
                à prendre les décisions pour limiter les effets néfastes de l'activité de humaine sur l'environnement de vie sur terre.
                <br>
                devant l'urgence et la criticité de la situation et en dignes héritiers de la pensée colibri, nous avons pensé un ambitieux programme de sauvetage d'espèces
                vivantes menacées de disparition: <strong>ZOE</strong>.
                brNous avons réussi le challenge de rallier à notre cause un grand nombre de personnes. Nous avons pu
                imaginer et valider un un processus citoyen pour sécourir les espèces menacées.
                La levée de fonds qui a suivi été un franc succes.
                <br>

            </div>
        </div>
        <div class="f-hr"></div>
        <div class="row space40"></div>
        <div class="row">
            <div class="span12">
                <div class="row">
                    <!-- Service Container -->
                    <div class="span4">
                        <!-- Service Icon -->
                        <div class="ic-1"><i class="icon-lightbulb"></i></div>
                        <!-- Service Title -->
                        <div class="title-1"><h4>ADN</h4></div>
                        <!-- Service Content -->
                        <div class="text-1">
                            <strong>ZOE</strong> adopte une approche globaliste prenant en compte l’interdépendance entre l'état de la planète et le développement humain.
                        </div>
                    </div>
                    <!-- Service Container End -->
                    <div class="span4">
                        <div class="ic-1"><i class="icon-resize-small"></i></div>
                        <div class="title-1"><h4>Organisation</h4></div>
                        <div class="text-1">
                            <strong>ZOE</strong> est une fondation indépendante de droit France impliquée à l'échelle mondiale dans la protection de l'environnement.
                        </div>
                    </div>
                    <div class="span4">
                        <div class="ic-1"><i class="icon-eye-open"></i></div>
                        <div class="title-1"><h4>Finance</h4></div>
                        <div class="text-1">
                            Grâce à votre mobilisation et votre générosité, <lstrong>ZOE</lstrong> a vu ses leviers d’action renforcés : plus de possibilités de programmes sur le terrain, .
                        </div>
                    </div>
                </div>

            </div>

            <div class="span12">
                <h2>Equipe</h2>
            </div>
            <div class="span8">
                <img src="{{ asset('assets/front/img/image01.png') }}" alt="">
            </div>
            <div class="span4">
                <div class="ic-1"></div>
                <div class="title-1"><h4>Nos sites:</h4></div>
                <!-- List -->
                <div class="text-1">
                    <ul class="list-b">
                        <!-- List Items -->
                        <li><i class="icon-ok"></i> Lille</li>
                        <li><i class="icon-ok"></i> Dax</li>
                        <li><i class="icon-ok"></i> Annecy</li>

                    </ul>
                </div>
                <!-- List End -->
            </div>

        </div>

        <div class="space40"></div>

        <!-- Typography Row -->
        <div class="row t-row">
            <!-- Line -->
            <div class="span12"><hr></div>
            <div class="span9">
                <h2>Faire un don</h2>
            </div>
            <div class="span3">
                <!-- Button -->
                <div class="btn btn-blue f-right">
                    <!-- Title -->
                    <h6><i class="icon-signin hidden-tablet"></i> Don</h6>
                </div>
            </div>
            <div class="space30 visible-phone"></div>
            <!-- Line -->
            <div class="span12"><hr></div>
        </div>
        <!-- Typography Row End-->


        <!-- Our Clients -->
        <div class="row">
            <div class="span12">
                <h3>Nos parteneaires</h3>
            </div>
        </div>

        <div  class="slider2 flexslider">
            <ul class="slides">
                <li>
                    <div class="row">

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part1.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part2.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part3.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part4.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>



                    </div>
                </li>
                <li>
                    <div class="row">

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part1.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part2.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part3.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="span3 square-1">
                                <div class="img-container">
                                    <img src="{{ asset('assets/front/img/part4.png') }}" alt="">
                                    <div class="img-bg-icon"></div>
                                </div>
                            </div>
                        </a>



                    </div>
                </li>

            </ul>
        </div>
        <!-- Our Clients End -->

        <div class="space50"></div>

    </div>
</div>
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
