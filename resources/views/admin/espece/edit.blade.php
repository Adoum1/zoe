<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Espece-edit')

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
                <li class="active"><i class="material-icons">library_books</i> Modifier un espèce</li>

            </ol>
        </h2>
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.espece.update', $espece->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $espece->name }}">
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
                                <textarea name="description" id="tinymce" cols="30" rows="10">{{ $espece->description }}</textarea>
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

                            <!--Embranchenement -->

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('embranchements') ? 'focused error' : '' }}">
                                    <label for="embranchement">Embranchements</label>
                                    <select name="embranchements[]" id="classe" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($embranchements as $embranchement)
                                            <option
                                                    @foreach($espece->embranchements as $especeEmbranchement)
                                                            {{ $especeEmbranchement->id == $embranchement->id ? 'selected' : '' }}
                                                    @endforeach

                                                    value="{{ $embranchement->id }}">{{ $embranchement->name }}
                                            </option>

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
                                            <option
                                                    @foreach($espece->classes as $especeClasse)
                                                    {{ $especeClasse->id == $classe->id ? 'selected' : '' }}
                                                    @endforeach

                                                    value="{{ $classe->id }}">{{ $classe->name }}
                                            </option>

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
                                            <option
                                                    @foreach($espece->ordres as $especeOrdre)
                                                    {{ $especeOrdre->id == $ordre->id ? 'selected' : '' }}
                                                    @endforeach

                                                    value="{{ $ordre->id }}">{{ $ordre->name }}
                                            </option>

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
                                            <option
                                                    @foreach($espece->familles as $especeFamille)
                                                    {{ $especeFamille->id == $famille->id ? 'selected' : '' }}
                                                    @endforeach

                                                    value="{{ $famille->id }}">{{ $famille->name }}

                                            </option>

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
                                            <option
                                                    @foreach($espece->genres as $especeGenre)
                                                    {{ $especeGenre->id == $genre->id ? 'selected' : '' }}
                                                    @endforeach

                                                    value="{{ $genre->id }}">{{ $genre->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--end Genre -->

                            <br>

                            <a href="{{ route('admin.espece.index') }}" class="btn btn-danger m-t-15 waves-effect"><i class="material-icons">arrow_back</i>Retour</a>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"><i class="material-icons">save</i>Enregistrer</button>

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


