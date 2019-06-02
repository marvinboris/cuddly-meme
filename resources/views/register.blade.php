@extends("partials.layout")

@section('stylesheet')
 <style>
     .help-block {
         color: red;
     }

     .has-error input {
         border-color: red;
     }
 </style>
@endsection


@section("content")

@parent

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Create Account</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="add-resume box">
                    <div class="post-header">
                        <p>Already have an account? <a href="{{ route('login') }}">Click here to login</a></p>
                    </div>
                    <form class="form-ad" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <h3>Basic information</h3>

                        <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                            <label class="control-label">First Name</label>
                            <input type="text" required name="first_name" class="form-control" placeholder="First Name" value="{{ @old('first_name') }}">
                            {!! $errors->first('first_name', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                            <label class="control-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ @old('last_name') }}">
                            {!! $errors->first('last_name', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                            <label class="control-label">Phone</label>
                            <input type="tel" required name="phone" class="form-control" placeholder="Your phone number" value="{{ @old('phone') }}">
                            {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group  {{ $errors->first('birthdate', 'has-error') }}">
                            <label class="control-label">Birthdate</label>
                            <input type="date" required max="100" class="form-control" name="birthdate" placeholder="birthdate" value="{{ @old('birthdate') }}">
                            {!! $errors->first('birthdate', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('sex', 'has-error') }}">
                            <label class="control-label">Gender</label>
                            <select class="form-control" required name="sex" id="sex" placeholder="Gender">
                                <option></option>
                                <option value="M" @if(old('sex') == 'M') selected @endif >Male</option>
                                <option value="F" @if(old('sex') == 'F') selected @endif >Female</option>
                            </select>
                            {!! $errors->first('sex', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('country_id', 'has-error') }}">
                            <label class="control-label">Country</label>
                            <select class="form-control" required name="country_id" id="country" placeholder="Country">
                                <option></option>
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}" @if($item->id == old('country_id')) selected @endif >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('country_id', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('city_id', 'has-error') }}">
                            <label class="control-label">City <i id='city_spinner' style='display:none;' class="fa fa-spinner fa-spin"></i></label>
                            <select class="form-control" required name="city_id" placeholder="City" id="city">
                                <option></option>
                            </select>
                            {!! $errors->first('city_id', '<small class="help-block">:message</small>') !!}
                        </div>

                        <h3>About work</h3>

                        <div class="form-group {{ $errors->first('activity_area_id', 'has-error') }}">
                            <label class="control-label">Activity Area</label>
                            <select class="form-control" required name="activity_area_id" id="activity_area_id" placeholder="Your Activity Area">
                                <option></option>
                                @foreach ($activities as $item)
                                    <option value="{{ $item->id }}" @if($item->id == old('activity_area_id')) selected @endif >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('activity_area_id', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('specialization', 'has-error') }}">
                            <label class="control-label">Specialization, your job details</label>
                            <textarea required name="specialization" class="form-control" rows="7">{{ @old('specialization') }}</textarea>
                            {!! $errors->first('specialization', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('cv_file', 'has-error') }}">
                            <label class="control-label">Curriculum Vitae</label>
                            <div class="button-group">
                                <div class="action-buttons">
                                    <div class="upload-button">
                                        <button class="btn btn-common">Choose Your CV</button>
                                        <input required id="cover_img_file_3" name="cv_file" type="file" accept="application/pdf">
                                    </div>
                                </div>
                            </div>
                            {!! $errors->first('cv_file', '<small class="help-block">:message</small>') !!}
                        </div>

                        <h3>Connexion information</h3>


                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label class="control-label">Email</label>
                            <input type="email" required name="email" class="form-control" placeholder="example@domain.com" value="{{ @old('email') }}">
                            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('password', 'has-error') }}">
                            <label class="control-label">Password</label>
                            <input type="password" required name="password" min="4" max="32" class="form-control" placeholder="Your password">
                            {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                            <label class="control-label">Password confirm</label>
                            <input type="password" required name="password_confirm" class="form-control" placeholder="Confirm your password">
                            {!! $errors->first('password_confirm', '<small class="help-block">:message</small>') !!}
                        </div>


                        <div class="add-post-btn">
                            <div class="float-right">
                                <button type="submit" class="btn btn-common"><i class="ti-plus"></i> Save and proceed to payment</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            var cityId = parseInt("{{ old('city_id') }}");
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
                            if(cityId === city.id) {
                                html += "<option value='"+ city.id +"' selected>"+city.name+"</option>";
                                cityId = false;
                            }else{
                                html += "<option value='"+ city.id +"'>"+city.name+"</option>";
                            }
                        });
                        $('#city').html(html);
                        $('#city_spinner').hide();
                    },
                    error: function(a){ $('#city_spinner').hide();}
                });
                $('#').change();
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
