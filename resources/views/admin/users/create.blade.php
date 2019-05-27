@extends('admin.layout.default')

@section('title')
   Add new user
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Add new user</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add</a></li>
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
                                <h4 class="card-title" id="horz-layout-colored-controls">Add new user</h4>
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
                                        <p> Fill the form below to add new user, field with <code>*</code> are required. Fields that do not figures here will be completed by user himself.</p>
                                    </div>
                                    <form class="form form-horizontal" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-eye"></i> User details</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">First Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" required placeholder="First Name" name="first_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Phone</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" required type="tel" name="phone" inputmode="tel" placeholder="Phone number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput3">Last Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Country</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" required name="country_id" id="country" placeholder="Country">
                                                                <option></option>
                                                                @foreach ($countries as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                            <input class="form-control" type="email" required inputmode="email" placeholder="email" id="email" name="email">
                                                            <small style="color:red;display:none;" id="email_exist">This mail has already been taken</small>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput6">Birthdate</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="date" required name="birthdate">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Gender</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control " required name="sex" placeholder="Gender">
                                                                <option></option>
                                                                <option value="M">Male</option>
                                                                <option value="F">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">City <i id='city_spinner' style='display:none;' class="fa fa-spinner fa-spin"></i></label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" required name="city_id" placeholder="City" id="city">
                                                                <option></option>
                                                                <option>First choose a country</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput8">Specialization</label>
                                                        <div class="col-md-9">
                                                            <textarea id="userinput8" rows="5" required class="form-control " name="specialization" placeholder="User specialization"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Profile picture</label>
                                                        <div class="col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" name="pic_file" class="form-control custom-file-input " id="inputGroupFile01" accept="image/*">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose image file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Curriculum Vitae</label>
                                                        <div class="col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" required name="cv_file" class="form-control custom-file-input " id="inputGroupFile01" accept="application/pdf">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose PDF file</label>
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
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose video file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Activity area</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" required name="activity_area_id" placeholder="Activity area">
                                                                <option></option>
                                                                @foreach ($activities as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>                                                                                                                  </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">1<sup>st</sup> Social network link</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="url" name="social_link1" placeholder="Social network link 1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">2<sup>th</sup> Social network link</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="url" name="social_link2" placeholder="Social network link 2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Activate account</label>
                                                        <div class="col-md-9">
                                                            <input type="checkbox" name="activate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">3<sup>th</sup> Social network link</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="url" name="social_link3" placeholder="Social network link 3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions right">
                                            <button type="button" class="btn btn-danger mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Submit
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

