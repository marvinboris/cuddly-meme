@extends('admin.layout.default')

@section('title')
   Modifier un utilisateur
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Modifier un utilisateur</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Utilisateurs</a></li>
                            <li class="breadcrumb-item active"><a href="#">Modifier</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-colored-controls">Modifier utilisateur {{ $user->first_name }}</h4>
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
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <p> Remplissez le formulaire suivant pour modifier un l'utilisateur, les champs marqués <code>*</code> sont obligatoire. Les champs ne figurant pas ici seront completés dans le profile de l'uitilsateur par lui même.</p>
                                    </div>
                                    <form class="form form-horizontal" method="POST" action="{{ route('admin.users.update', [$user->id]) }}" enctype="multipart/form-data">
                                        @csrf @method('PATCH')
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-eye"></i> Détails de l'utilisateur</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Nom</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{ $user->first_name }}" required placeholder="Nom" name="first_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Téléphone</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" required type="tel" value="{{ $user->phone }}" name="phone" inputmode="tel" placeholder="Numéro de téléphone">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput3">Prénom</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{ $user->last_name }}" placeholder="Prénom" name="last_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Pays</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" required name="country_id" id="country" placeholder="Pays">
                                                                <option></option>
                                                                @foreach ($countries as $item)
                                                                    <option value="{{ $item->id }}" @if($user->city->country->id == $item->id) selected @endif>{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="email">Email <i id='email_spinner' style='display:none;' class="fa fa-spinner fa-spin"></i></label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="email" value="{{ $user->email }}" required inputmode="email" placeholder="email" id="email" name="email">
                                                            <small style="color:red;display:none;" id="email_exist">Cette email est déjà prise</small>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput6">Date de naissance</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" value="{{ $user->birthdate }}" type="date" required name="birthdate">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Sexe</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control " required name="sex" placeholder="Sexe">
                                                                <option></option>
                                                                <option value="M" @if(strtoupper($user->sex) == 'M') selected @endif>Homme</option>
                                                                <option value="F" @if(strtoupper($user->sex) == 'F') selected @endif>Femme</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Ville <i id='city_spinner' style='display:none;' class="fa fa-spinner fa-spin"></i></label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" required name="city_id" placeholder="Ville" id="city">
                                                                <option value="{{ $user->city->id }}">{{ $user->city->name }}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput8">Spécialisation</label>
                                                        <div class="col-md-9">
                                                            <textarea id="userinput8" rows="5" required class="form-control" name="specialization" placeholder="Expliquer en quelque ligne ce dans quoi fait l'utilisateur">{{ $user->specialization }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Photo de profile</label>
                                                        <div class="col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" name="pic_file" class="form-control custom-file-input " id="inputGroupFile01" accept="image/*">
                                                                <label class="custom-file-label" for="inputGroupFile01">
                                                                    @if($user->pic)
                                                                        Laisser pour ne pas changer
                                                                    @else 
                                                                        Choisir une video
                                                                    @endif
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Curriculum Vitae</label>
                                                        <div class="col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" name="cv_file" class="form-control custom-file-input " id="inputGroupFile01" accept="application/pdf">
                                                                <label class="custom-file-label" for="inputGroupFile01">Laisser pour ne pas changer</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Video</label>
                                                        <div class="col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" name="video_file" class="form-control custom-file-input " id="inputGroupFile01" accept="video/*">
                                                                <label class="custom-file-label" for="inputGroupFile01">
                                                                    @if($user->video)
                                                                        Laisser pour ne pas changer
                                                                    @else 
                                                                        Choisir une video
                                                                    @endif
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Secteur d'activité</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" required name="activity_area_id" placeholder="Secteur d'activité">
                                                                <option></option>
                                                                @foreach ($activities as $item)
                                                                    <option value="{{ $item->id }}" @if($user->activityArea->id == $item->id) selected @endif>{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>                                                                                                                  </div>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">1<sup>er</sup> réseau social</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="url" value="{{ $user->social_link1 }}" name="social_link1" placeholder="Reseaux social 1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">2<sup>ième</sup> réseau social</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="url" value="{{ $user->social_link2 }}" name="social_link2" placeholder="Reseaux social 2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                       
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">3<sup>ième</sup> réseau social</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="url" value="{{ $user->social_link3 }}"  name="social_link3" placeholder="Reseaux social 3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions right">
                                            <button type="button" class="btn btn-danger mr-1">
                                                <i class="ft-x"></i> Annuler
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Modifier
                                            </button>
                                        </div>
                                        <input id='hidden' type="hidden" />
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END: Content-->

@endsection

@section('footer_scripts')

    {{-- <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/app-assets/vendors/js/pickers/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/app-assets/vendors/js/pickers/pickadate/legacy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/app-assets/vendors/js/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS--> --}}

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/admin/app-assets/js/scripts/forms/custom-file-input.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->

    <script>
        $(document).ready(function(){
            $.each($('.form-control'), function(i,input) {
                input = $(input);
                var addons = "<sup style='color:red'>*</sup>";
                if(input.attr('required') !== undefined){
                    var label = input.parent().parent().find('.label-control');
                    if(input.attr('type') == 'file'){
                        label = input.parent().parent().parent().find('.label-control');
                    }
                    var html = label.html() + addons;
                    label.html(html);
                }
            });
        });


        $(document).ready(function(){
            $('#country').change(function(e){
                var country_id = $(this).val();
                $.ajax({
                    url: "{{ route('ajax-get-cities-by-country') }}",
                    method: 'POST',
                    data: 'id='+country_id+'&_token={{ csrf_token() }}',
                    beforeSend: function(){
                        $('#city_spinner').show();
                    },
                    success: function(data) {
                        var html = '<option></option>';
                        $.each(data, function(i,city){
                            html += "<option value='"+ city.id +"'>"+city.name+"</option>";
                        });
                        $('#city').html(html);
                        $('#city_spinner').hide();
                    },
                    error: function(a){ $('#city_spinner').hide();}
                });
            });
        });

        $(document).ready(function(){
            $('#email').change(function(){
                var email = $(this).val();
                if(email == '{{ $user->email }}'){
                    return;
                }

                $.ajax({
                    url: "{{ route('admin.users.ajax-check-email') }}",
                    method: 'POST',
                    data: 'email='+email+'&_token={{ csrf_token() }}',
                    beforeSend: function(){
                        $('#email_spinner').show();
                    },
                    success: function(data) {
                        if(data.status){
                            $('#email').addClass('border-danger');
                            $('#email_exist').show();
                            $('#hidden').attr('required','required');
                        }else{
                            $('#email').removeClass('border-danger');
                            $('#email_exist').hide();
                            $('#hidden').removeAttr('required');
                        }
                        $('#email_spinner').hide();
                    },
                    error: function(a){ $('#email_spinner').hide();}
                });
            });
        });


        $(document).ready(function(){
            var date = new Date();
            date.setTime(date.getTime() - 1000*60*60*24);
            date = date.toISOString().split('T')[0];
            document.getElementsByName("birthdate")[0].setAttribute('max', date);
        });
    </script>
@endsection

