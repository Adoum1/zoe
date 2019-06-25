<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Site')

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
                <li class="active"><i class="material-icons">library_books</i> Gestion des sites de stockage</li>
                <li class="active"><i class="material-icons">library_books</i> Sites</li>

            </ol>
        </h2>
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.site.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <!-- Nom du site -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Nom du site</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="nom" name="nom" class="form-control">
                                    <label class="form-label">Nom du site</label>
                                </div>
                            </div>


                            <!-- Description de l'espèce -->

                            <div class="form-group">
                                <p>
                                    <b>Adresse</b>
                                </p>
                                <textarea name="rue" id="tinymce" cols="10" rows="10"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <!-- Pays -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Pays</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="pays" name="pays" class="form-control">
                                    <label class="form-label">Pays</label>
                                </div>
                            </div>


                            <!-- Commune -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Commune</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="commune" name="commune" class="form-control">
                                    <label class="form-label">Commune</label>
                                </div>
                            </div>

                            <!-- CP -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Code Postal</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="cp" name="cp" class="form-control">
                                    <label class="form-label">Code Postal</label>
                                </div>
                            </div>


                            <br>

                            <a href="{{ route('admin.site.index') }}" class="btn btn-danger m-t-15 waves-effect">Retour</a>

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


