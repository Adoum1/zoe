<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 3/16/19
 * Time: 12:59 PM
 */

?>

@extends('layouts.backend.app')

@section('title', 'Espèce')

@push('css')

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush


@section('content')

    <div class="container-fluid">
        <div class="block-header">

            <h2>
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="javascript:void(0);"><i class="material-icons">home</i> Acceuil</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Gestion des alertes</li>
                </ol>
            </h2>

            <h2>
                <a href="{{ route('admin.alerte.create') }}" class="btn btn-primary">
                   <i class="material-icons">add</i>
                    <span>Créer une alerte</span>
                </a>

                <!--
                <button type="button" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float">
                    <i class="material-icons">add</i>
                </button>
                -->

            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <h2>
                          Alertes
                            <span class="badge bg-blue">{{ $alertes->count() }}</span>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Libellé</th>
                                    <th>Espèce</th>
                                    <th>Description</th>
                                    <th>Niveau</th>
                                    <th>Date de création</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Libellé</th>
                                    <th>Espèce</th>
                                    <th>Description</th>
                                    <th>Niveau</th>
                                    <th>Date de création</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($alertes as $key=>$alerte)

                                        <tr>
                                            <td>{{ $key + 1  }}</td>
                                            <td>{{ $alerte->title }}</td>
                                            <td>
                                                @foreach($alerte->especes as $espece)
                                                    {{ $espece->name }}
                                                @endforeach
                                            </td>

                                            <td>{!! Str::limit($alerte->body, '50') !!}</td>
                                            <td>
                                                @if($alerte->level === 1)
                                                    <span class="badge bg-red">{{ $alerte->level }}</span>
                                                @else
                                                    <span class="badge bg-orange">{{ $alerte->level }}</span>
                                                @endif


                                            </td>

                                            <td>{{ $alerte->created_at }}</td>
                                            <td>
                                                @if($alerte->status == true)
                                                    <span class="badge bg-blue">Publiée</span>
                                                @else
                                                    <span class="badge bg-pink">En attente</span>
                                                @endif
                                            </td>

                                            <td class="text-center">

                                                <a href="{{ route('admin.alerte.show', $alerte->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a>

                                                <a href="{{ route('admin.alerte.edit', $alerte->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                <button class="btn btn-danger waves-effect" type="button" onclick="deleteAlerte({{ $alerte->id }})">
                                                    <i class="material-icons">delete</i>

                                                </button>

                                                <form id="delete-form-{{ $alerte->id }}" action="{{ route('admin.alerte.destroy',$alerte->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>

                                            </td>

                                        </tr>


                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection



@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.7.0/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        function deleteAlerte(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Etes vous sur?',
                text: "Voulez-vous vraiment supprimer cet espèce",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Non, annuler!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
