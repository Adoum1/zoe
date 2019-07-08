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
    <!-- #header -->

    <!-- header -->
    @include('layouts.frontend.partial.menu')
    <!-- #header -->



    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Taximonie</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Taximonie <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $espece->name }}
                    </h2>

                    <img src="{{Storage::disk('public')->url('espece/'.$espece->image) }}" alt="" class="img-fluid">

                    <p>test test{!! $espece->description !!}</p>

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alerteModal">
                                Launch demo modal
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="alerteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc">
                            <h3>George Washington</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        </div>
                    </div>


                    <div class="pt-5 mt-5">
                        <h3 class="mb-5 h4 font-weight-bold">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>{{ $espece->user->name }}</h3>
                                    <div class="meta mb-2">{{ $espece->created_at->diffForHumans() }}</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>

                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5 h4 font-weight-bold">Laisser un commentaire</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 sidebar ftco-animate">


                    <div class="sidebar-box ftco-animate">
                        <h3>Détail de la taximonie</h3>
                        <ul class="categories">
                            <li><a href="#">Règne <span> {{ $espece->regne }}</span></a></li>
                            <li><a href="#">Embranchement
                                    <span>
                                           @foreach($espece->embranchements as $embranchement)
                                            {{ $embranchement->name }}
                                        @endforeach
                                    </span>
                                </a>
                            </li>
                            <li><a href="#">Classe
                                    <span>

                                           @foreach($espece->classes as $classe)
                                            {{ $classe->name }}
                                        @endforeach
                                    </span>
                                </a>
                            </li>
                            <li><a href="#">Ordre <span>
                                          @foreach($espece->ordres as $ordre)
                                            {{ $ordre->name }}
                                        @endforeach
                                    </span></a>
                            </li>
                            <li><a href="#">Famille <span>

                                           @foreach($espece->familles as $famille)
                                            {{ $famille->name }}
                                        @endforeach
                                    </span></a>
                            </li>

                            <li><a href="#">Genre <span class="tag-cloud-link">

                                           @foreach($espece->genres as $genre)
                                          {{ $genre->name }}
                                        @endforeach
                                    </span></a>
                            </li>

                        </ul>
                    </div>


                </div><!-- END COL -->
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
    <script>

    </script>
</body>