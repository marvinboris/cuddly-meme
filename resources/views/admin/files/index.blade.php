@extends('admin.layout.default')

@section('title')
    Fichiers
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Fichiers</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Fichiers</a>
                            </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Scroll - horizontal table -->
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des fichiers</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <p style="display:none;" class="card-text">Scroll - horizontal DataTables has the ability to show tables with horizontal scrolling, which is very useful for when you have a wide table, but want to constrain it to a limited horizontal display area. To enable x-scrolling simply set the scrollX parameter to be whatever you want the container wrapper's width to be (this should be 100% in almost all cases with the width being constrained by the container element).</p>
                                        <div class="table-responsive">
                                            <table class="table display nowrap table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Nom du fichier</th>
                                                        <th>Type de fichier</th>
                                                        <th>Ajouter le</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($files as $file)
                                                    <tr>
                                                        <td>{{ $file->filename }}</td>
                                                        <td>{{ $file->mime }}</td>
                                                        <td>{{ $file->created_at }}</td>
                                                        <td>
                                                            <a class="btn btn-success" href="{{ route('admin.files.show', [$file->id]) }}" title="Voir le fichier {{$file->filename}}">Voir</a>
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
                    </div>
                </section>
            </div>
        </div>
    </div>
<!-- END: Content-->

<!--/ Scroll - horizontal table -->
@endsection
