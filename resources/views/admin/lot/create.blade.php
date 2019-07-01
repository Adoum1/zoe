<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Lot')

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
                <li class="active"><i class="material-icons">library_books</i> Gestion des lots</li>
                <li class="active"><i class="material-icons">library_books</i> Ajouter un lot</li>

            </ol>
        </h2>
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.lot.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <!-- libelle lot -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Libellé du lot</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="libelle" name="libelle" class="form-control" value="">
                                    <label class="form-label">Libellé du lot</label>
                                </div>
                            </div>

                            <!--Espèce -->
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('especes') ? 'focused error' : '' }}">
                                    <label for="espece">Espèce</label>
                                    <select name="especes[]" id="espece" class="form-control show-tick" data-live-search="true">
                                        @foreach($especes as $espece)
                                            <option value="{{ $espece->id }}">{{ $espece->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--end Espèce-->

                            <!-- libelle lot -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Type</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="type" name="type" class="form-control">
                                    <label class="form-label">Type</label>
                                </div>
                            </div>


                            <!-- Num Entree -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Entrée</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="entree" name="entree" class="form-control">
                                    <label class="form-label">Entrée</label>
                                </div>
                            </div>
                            <!-- FIn nEntree -->

                            <!-- Sortie -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Sortie</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="sortie" name="sortie" class="form-control">
                                    <label class="form-label">Sortie</label>
                                </div>
                            </div>
                            <!-- FIn Sortie -->

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <!-- Num Casier -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Numéro Casier</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="numCasier" name="numCasier" class="form-control">
                                    <label class="form-label">Numéro Casier</label>
                                </div>
                            </div>
                            <!-- FIn num Casier -->

                            <!-- salle -->
                            <div class="form-group form-float">
                                <p>
                                    <b>Salle</b>
                                </p>
                                <div class="form-line">
                                    <input type="text" id="salle" name="salle" class="form-control">
                                    <label class="form-label">Salle</label>
                                </div>
                            </div>
                            <!-- FIn salle -->

                            <!--Site -->
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('sites') ? 'focused error' : '' }}">
                                    <label for="site">Sites de stockage</label>
                                    <select name="sites[]" id="site" class="form-control show-tick" data-live-search="true">
                                        @foreach($sites as $site)
                                            <option value="{{ $site->id }}">{{ $site->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--end Site-->



                            <!--Ordre
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="condition">Conditions de stockage</label>
                                    <select name="condition" id="condition" class="form-control show-tick" data-live-search="true" multiple>
                                        <optgroup label="Luminosité">
                                            <option value="Luminosité Faible">Luminosité Faible</option>
                                            <option value="Luminosité Moyenne">Luminosité Moyenne</option>
                                            <option value="Luminosité Forte">Luminosité Forte</option>
                                        </optgroup>

                                        <optgroup label="Température">
                                            <option value="Température Faible">Température Faible</option>
                                            <option value="Température Moyenne">Température Moyenne</option>
                                            <option value="Température Forte">Température Forte</option>
                                        </optgroup>

                                        <optgroup label="Humidité">
                                            <option value="Humidité Faible">Humidité Faible</option>
                                            <option value="Humidité Moyenne">Humidité Moyenne</option>
                                            <option value="Humidité fForte">Humidité Forte</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            end ordre-->






                            <br>

                            <a href="{{ route('admin.lot.index') }}" class="btn btn-danger m-t-15 waves-effect">Retour</a>

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


