<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Espèce')

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
                <li class="active"><i class="material-icons">library_books</i> Famille</li>

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
                                    <input type="text" id="name" name="name" class="form-control">
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
                                <textarea name="description" id="tinymce" cols="30" rows="10"></textarea>
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
                                <select class="form-control show-tick" name="regne" id="regne">
                                    <option value="animal">Animal</option>
                                    <option value="vegetal">Végétal</option>
                                </select>
                            </div>

                            <!-- Genre de l'espèce
                            <div class="form-group">
                                <p>
                                    <b>Genre</b>
                                </p>
                                <input type="radio" name="gender" id="male" value="male" class="with-gap">
                                <label for="male">Male</label>

                                <input type="radio" name="gender" id="female" value="femelle" class="with-gap">
                                <label for="female" class="m-l-20">Female</label>
                            </div>-->

                            <!-- Classification de l'espèce
                            <div class="form-group">
                                <p>
                                    <b>Classification</b>
                                </p>
                                <select class="form-control show-tick" name="classification" id="classification" data-live-search="true">
                                    <option value="Mammifère">Mammifère</option>
                                    <option value="Oiseau">Oiseau</option>
                                    <option value="Poisson">Poisson</option>
                                    <option value="Amphibien">Amphibien</option>
                                    <option value="Reptile">Reptile</option>
                                </select>
                            </div>-->



                            <!--Embranchenement -->

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('embranchements') ? 'focused error' : '' }}">
                                    <label for="embranchement">Embranchements</label>
                                    <select name="embranchements[]" id="classe" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($embranchements as $embranchement)
                                            <option value="{{ $embranchement->id }}">{{ $embranchement->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end Embranchenement -->


                            <!--Classe -->
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('classes') ? 'focused error' : '' }}">
                                    <label for="classe">Classes</label>
                                    <select name="classes[]" id="classe" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($classes as $classe)
                                            <option value="{{ $classe->id }}">{{ $classe->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--end Classe -->

                            <!--Ordre -->
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('ordres') ? 'focused error' : '' }}">
                                    <label for="ordre">Ordres</label>
                                    <select name="ordres[]" id="ordre" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($ordres as $ordre)
                                            <option value="{{ $ordre->id }}">{{ $ordre->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--end ordre-->

                            <!--Famille -->
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('familles') ? 'focused error' : '' }}">
                                    <label for="famille">Familles</label>
                                    <select name="familles[]" id="famille" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($familles as $famille)
                                            <option value="{{ $famille->id }}">{{ $famille->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--end Famille -->

                            <!--Genre-->
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('genres') ? 'focused error' : '' }}">
                                    <label for="genre">Genres</label>
                                    <select name="genres[]" id="genre" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="status">Statut</label>
                                    <select class="form-control show-tick">
                                        <option value="">-- Sélectionner le statut --</option>
                                        <option value="1">Vert</option>
                                        <option value="2">Orange</option>
                                        <option value="3">Rouge</option>


                                    </select>
                                </div>
                            </div>

                            <!--end Genre -->





                            <!-- Date de naissance de l'espèce
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                </div>
                            </div>-->

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


