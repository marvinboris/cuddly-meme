@extends('admin.layout.default')

@section('title')
 {{ $user->first_name }}
@endsection

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/pages/users.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/pages/timeline.min.css') }}">
@endsection

@section('content')


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row"></div>
        <div class="content-body">
            <div id="user-profile">
                <div class="row">
                    <div class="col-sm-12 col-xl-8">
                        <div class="media d-flex m-1 ">
                            <div class="align-left p-1">
                                <a href="#" class="profile-image">
                                    @if($user->pic)
                                        <img src="{{ url('files/' . $user->pic->filename) }}" class="rounded-circle img-border height-100" alt="Card image">
                                    @else
                                        <img src="{{ asset('assets/default-avatar.png') }}" class="rounded-circle img-border height-100" alt="Card image">
                                    @endif
                                </a>
                            </div>
                            <div class="media-body text-left  mt-1">
                                <h3 class="font-large-1 white">{{ $user->first_name . ' ' . $user->last_name }} 
                                    <span class="font-medium-1 white">({{ $user->activityArea->name }})</span>
                                </h3>
                                <p class="white">
                                    <i class="ft-map-pin white"> </i> {{ $user->city->name }}, {{ $user->city->country->name }} 
                                </p>
                                <p class="white text-bold-300 d-none d-sm-block">{{ $user->specialization }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-5 col-md-12">
                        
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-primary">
                                    <div class="card-title">Curriculum Vitae</div>
                                    <hr>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0 pt-0 pb-1">
                                    <ul>
                                        <li>
                                            <strong>Fichier:</strong>
                                            <a href="{{ route('admin.files.show', [$user->cv->id]) }}"><span class="info"><b>Voir</b></span></a>
                                        </li>
                                        <li><strong>Type:</strong>{{ $user->cv->mime }}</li>
                                        <li><strong>Mise à jour:</strong>{{ $user->cv->created_at }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-primary">
                                    <div class="card-title">Video</div>
                                    <hr>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0 pt-0 pb-1">
                                    <ul>
                                        <li>
                                            <strong>Disponible: </strong>
                                            {{ $user->video ? 'OUI' : 'NON' }}
                                        </li>
                                        @if($user->video)
                                        <li><strong>Type:</strong>{{ $user->video->mime }}</li>
                                        <li><strong>Mise à jour:</strong>{{ $user->video->created_at }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-primary">
                                    <div class="card-title">Réseaux sociaux</div>
                                    <hr>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0 pt-0 pb-1">
                                    <ul>
                                        @if($user->social_link1)
                                        <li><a href="{{ $user->social_link1 }}"><span class="info"><b>{{ $user->social_link1 }}</b></span></a></li>
                                        @endif
                                        @if($user->social_link2)
                                        <li><a href="{{ $user->social_link2 }}"><span class="info"><b>{{ $user->social_link2 }}</b></span></a></li>
                                        @endif
                                        @if($user->social_link3)
                                        <li><a href="{{ $user->social_link3 }}"><span class="info"><b>{{ $user->social_link3 }}</b></span></a></li>
                                        @endif
                                        @if(!$user->social_link1 && !$user->social_link2 && !$user->social_link3)
                                            Aucun
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-xl-9 col-lg-7 col-md-12">


                         <!--Project Timeline div starts-->
                        <div id="timeline">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title-wrap bar-primary">
                                        <div class="card-body">
                                            <h1>Détail de l'utilisateur</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Project Timeline div ends-->


                        <div class="email-app-title card-body">
                            <div class="row">
                                <div class="col-md-8 col-12 text-left ">
                                    <h3 class="list-group-item-heading">Informations de profile</h3>
                                </div>
                            </div>
                        </div>

                        <div class="media-list">
                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Nom</h6>
                                        <p class="list-group-item-text"> {{ $user->first_name }}</p>
                                    </div>
                                </a>
                            </div>

                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Prénom</h6>
                                        <p class="list-group-item-text"> {{ $user->last_name }}</p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">E-mail</h6>
                                        <p class="list-group-item-text"> {{ $user->email }}</p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Sexe</h6>
                                        <p class="list-group-item-text"> {{ strtoupper($user->sex) == 'M' ? 'Homme':'Femme' }}</p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Secteur d'activité</h6>
                                        <p class="list-group-item-text"> {{ $user->activityArea->name }} </p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Specialisation</h6>
                                        <p class="list-group-item-text"> {{ $user->specialization }}</p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Téléphone</h6>
                                        <p class="list-group-item-text"> {{ $user->phone }}</p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Ville</h6>
                                        <p class="list-group-item-text"> {{ $user->city->name }} - {{ $user->city->country->name }}</p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Date de naissance </h6>
                                        <p class="list-group-item-text"> {{ $user->birthdate  }}</p>
                                    </div>
                                </a>
                            </div>



                            <div class="email-app-title card-body">
                                <div class="row">
                                    <div class="col-md-8 col-12 text-left ">
                                        <h3 class="list-group-item-heading">Activités liées au compte</h3>
                                    </div>
                                </div>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Dernière connexion </h6>
                                        <p class="list-group-item-text"> {{ $user->last_login  }}</p>
                                    </div>
                                </a>
                            </div>


                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Dernière mise à jour du compte </h6>
                                        <p class="list-group-item-text"> {{ $user->updated_at  }}</p>
                                    </div>
                                </a>
                            </div>

                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">Date création du compte </h6>
                                        <p class="list-group-item-text"> {{ $user->created_at  }}</p>
                                    </div>
                                </a>
                            </div>



                            <div class="email-app-title card-body">
                                <div class="row">
                                    <div class="col-md-8 col-12 text-left ">
                                        <h3 class="list-group-item-heading">Réponse aux questions</h3>
                                    </div>
                                </div>
                            </div>

                            @forelse ($user->responses as $response)
                            
                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700">{{ $response->question->label }} </h6>
                                        <p class="list-group-item-text"> {{ $response->content  }}</p>
                                    </div>
                                </a>
                            </div>
                                
                            @empty
                                
                                <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            @if($user->pic)
                                                <img class="media-object rounded-circle" src="{{ url('files/' . $user->pic->filename) }}" alt="Generic placeholder image">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ asset('assets/default-avatar.png') }}" alt="Generic placeholder image">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading text-bold-700"> </h6>
                                        <p class="list-group-item-text"> Cette utilisateur n'a répondu à aucune question</p>
                                    </div>
                                </a>
                            </div>

                            @endforelse 
                        
                    </div>


            </div>
        </div>
    </div>

</div>
</div>
</div>
@endsection