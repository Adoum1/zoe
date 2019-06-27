<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Salarié MAJ')

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
                <li class="active"><i class="material-icons">library_books</i> Gestion des salariés</li>
                <li class="active"><i class="material-icons">library_books</i> Ajouter un salarié</li>

            </ol>
        </h2>
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.salarie.update', $salarie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <!-- Nom du stockage -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Nom du salarié</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="nom" name="nom" class="form-control" value="{{ $salarie->nom }}">
                                    <label class="form-label">Nom du salarié</label>
                                </div>
                            </div>

                            <!-- Nom du stockage -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Prénom du salarié</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $salarie->prenom }}">
                                    <label class="form-label">Prénom du salarié</label>
                                </div>
                            </div>


                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="sexe">Sexe</label>
                                    <select name="sexe" id="sexe" class="form-control show-tick" data-live-search="true">
                                            <option value="Masculin">Masculin</option>
                                            <option value="Feminin">Feminin</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Nom du stockage -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Adresse</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $salarie->adresse }}">
                                    <label class="form-label">Adresse</label>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <!-- Nom du stockage -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Poste</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="poste" name="poste" class="form-control" value="{{ $salarie->poste }}">
                                    <label class="form-label">Poste du salarié</label>
                                </div>
                            </div>

                            <!--Site -->
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('sites') ? 'focused error' : '' }}">
                                    <label for="site">Sites de rattachement</label>
                                    <select name="sites[]" id="site" class="form-control show-tick" data-live-search="true">
                                        @foreach($sites as $site)
                                            <option
                                                    @foreach($salarie->sites as $salarieSite)
                                                    {{ $salarieSite->id == $site->id ? 'selected' : '' }}
                                                    @endforeach
                                                    value="{{ $site->id }}">{{ $site->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--end Site-->






                            <br>

                            <a href="{{ route('admin.salarie.index') }}" class="btn btn-danger m-t-15 waves-effect">Retour</a>

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


