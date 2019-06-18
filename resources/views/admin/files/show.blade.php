@extends('admin.layout.default')

@section('title')
    {{ $file->filename }}
@endsection

@section('header_styles')
<style>
    #iframepdf{
        width: 100%;
        height: 40em;
    }
</style>
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Voir fichier</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.files.index') }}">Fichiers</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Voir</a>
                            </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Basic Carousel start -->
                <section id="basic-carousel">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ $file->filename }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 border-right-blue-grey border-right-lighten-5">
                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="carousel-item active">
                                                            @include('file-viewer', ['file' => $file])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Basic Carousel end -->

            </div>
        </div>
    </div>
<!-- END: Content-->
@endsection
