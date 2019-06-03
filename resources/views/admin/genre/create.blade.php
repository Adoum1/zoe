<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/17/19
 * Time: 12:32 AM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Genre')

@push('css')


@endpush

@section('content')

    <!-- Vertical Layout | With Floating Label -->
    <div class="container-fuild">
        <h2>
            <ol class="breadcrumb breadcrumb-bg-pink">
                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Acceuil</a></li>
                <li class="active"><i class="material-icons">library_books</i> Gestion de la Taxinomie</li>
                <li class="active"><i class="material-icons">library_books</i> Genre</li>

            </ol>
        </h2>

    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Création Genre
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('admin.genre.store') }}" method="POST">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control">
                                <label class="form-label">Nom de la genre</label>
                            </div>
                        </div>

                        <br>

                        <a href="{{ route('admin.genre.index') }}" class="btn btn-danger m-t-15 waves-effect">Retour</a>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->

@endsection

@push('js')


@endpush


