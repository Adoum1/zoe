<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'post')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
@endpush

@section('content')

    <div class="container-fuild">
        <h2>
            <ol class="breadcrumb breadcrumb-bg-pink">
                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Acceuil</a></li>
                <li class="active"><i class="material-icons">library_books</i> Gestion de la Taxinomie</li>
                <li class="active"><i class="material-icons">library_books</i> Espèce</li>
                <li class="active"><i class="material-icons">library_books</i> Ajouter une espèce</li>

            </ol>
        </h2>
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.espece.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <!-- Nom de l'espèce -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Nom de l'espèce</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="name" name="title" class="form-control">
                                    <label class="form-label">Nom de l'espèce</label>
                                </div>
                            </div>

                            <!-- Photo de l'epèce -->
                            <div class="form-group">
                                <label for="image">Image de l'espèce</label>
                                <input type="file" name="image">
                            </div>

                            <!-- Description de l'espèce -->

                            <div class="form-group">
                                <p>
                                    <b>Description</b>
                                </p>
                                <textarea name="body" id="tinymce" cols="30" rows="10"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <!-- Règne de l'espèce -->
                            <div class="form-group">
                                <p>
                                    <b>Règne</b>
                                </p>
                                <select class="form-control show-tick">
                                    <option>Animal</option>
                                    <option>Végétal</option>
                                </select>
                            </div>

                            <!-- Genre de l'espèce -->
                            <div class="form-group">
                                <p>
                                    <b>Genre</b>
                                </p>
                                <input type="radio" name="gender" id="male" class="with-gap">
                                <label for="male">Male</label>

                                <input type="radio" name="gender" id="female" class="with-gap">
                                <label for="female" class="m-l-20">Female</label>
                            </div>

                            <!-- Classification de l'espèce -->
                            <div class="form-group">
                                <p>
                                    <b>Classification</b>
                                </p>
                                <select class="form-control show-tick" data-live-search="true">
                                    <option>Hot Dog, Fries and a Soda</option>
                                    <option>Burger, Shake and a Smile</option>
                                    <option>Sugar, Spice and all things nice</option>
                                </select>
                            </div>

                            <!-- Date de naissance de l'espèce -->
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                </div>
                            </div>

                            <br>

                            <a href="{{ route('admin.espece.index') }}" class="btn btn-danger m-t-15 waves-effect">Retour</a>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enregistrer</button>

                        </div>
                    </div>
                </div>
            </div>



        </form>
        <!-- Vertical Layout | With Floating Label -->
    </div>

@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/public/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>

    <script>
        $(function () {
            //CKEditor
            // CKEDITOR.replace('ckeditor');
            //CKEDITOR.config.height = 300;

            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
    </script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>


@endpush


