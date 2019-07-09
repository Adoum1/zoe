<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Alerte')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')

   <div class="container-fluid">
       <!-- Vertical Layout | With Floating Label -->
       <div class="block-header">

           <h2>
               <ol class="breadcrumb breadcrumb-bg-pink">
                   <li><a href="javascript:void(0);"><i class="material-icons">home</i> Acceuil</a></li>
                   <li class="active"><i class="material-icons">library_books</i> Gestion de la Taxinomie</li>
                   <li class="active"><i class="material-icons">library_books</i> Espèce</li>
               </ol>
           </h2>

           <h2>
               <a href="{{ route('admin.alerte.index') }}" class="btn btn-danger waves-effect">
                   <i class="material-icons">arrow_back</i>
                   <span>Retour</span>
               </a>

           </h2>
       </div>

           <div class="row clearfix">
               <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                   <div class="thumbnail">
                       @foreach($alerte->especes as $espece)
                           <img src="{{Storage::disk('public')->url('espece/'.$espece->image) }}">
                       @endforeach


                       <div class="caption">
                           <h3> {{ $alerte->title }}</h3>
                           <small>Ecrit par <strong><a href="">{{ $alerte->user->nom }}</a></strong>
                               à {{ $alerte->created_at->toFormattedDateString() }}
                           </small>
                           <p>
                               {!! $alerte->body !!}
                           </p>

                       </div>
                   </div>
               </div>



               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   <div class="card">
                       <div class="header">
                           <h2>
                               DETAIL DE L'ALERTE
                           </h2>

                       </div>
                       <div class="body">
                           <div class="row clearfix">

                               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                   <button class="btn bg-green btn-lg btn-block waves-effect" type="button">Espèce : <span class="badge">

                                           @foreach($alerte->especes as $espece)
                                               {{ $espece->name }}
                                           @endforeach

                                       </span></button>
                               </div>

                               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                   <button class="btn bg-green btn-lg btn-block waves-effect" type="button">Niveau de l'alerte : <span class="badge">

                                          {{ $alerte->level }}
                                       </span></button>
                               </div>

                           </div>
                       </div>
                   </div>


                   <div class="card">
                       <div class="header">
                           <h2>
                               DETAIL DE LA TAXINOMIE DE L'ESPECE
                           </h2>

                       </div>
                       <div class="body">
                           <div class="row clearfix">
                               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                   <button class="btn bg-green btn-lg btn-block waves-effect" type="button">Règne : <span class="badge">

                                           @foreach($alerte->especes as $espece)
                                               {{ $espece->regne }}

                                           @endforeach

                                       </span></button>
                               </div>

                               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                   <button class="btn bg-green btn-lg btn-block waves-effect" type="button">Embranchement : <span class="badge">

                                           @foreach($alerte->especes as $espece)
                                               @foreach($espece->embranchements as $embranchement)
                                                   {{ $embranchement->name }}
                                               @endforeach

                                           @endforeach

                                       </span></button>
                               </div>


                               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                   <button class="btn bg-green btn-lg btn-block waves-effect" type="button">Classe : <span class="badge">


                                           @foreach($alerte->especes as $espece)
                                               @foreach($espece->classes as $classe)
                                                   {{ $classe->name }}
                                               @endforeach

                                           @endforeach


                                       </span></button>
                               </div>




                           </div>
                       </div>
                   </div>
               </div>






           </div>

       <!-- Vertical Layout | With Floating Label -->
   </div>

@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/public/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>


    <!--     approve post            -->

    <script type="text/javascript">
        function approvePost(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Voulez vous valider cet article ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // event.preventDefault();
                    document.getElementById('approval-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Article validé:)',
                        'Info'
                    )
                }
            })
        }
    </script>

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


@endpush


