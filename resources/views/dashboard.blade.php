

@extends("partials.layout")

@section('stylesheet')
 <style>
    .video-box{
        width: 90%;
    }
    .cv-box{
        width: 90%;
        height: 30em;
    }

    button[type=submit]:disabled{
        opacity: 0.35;
        cursor:not-allowed;
    }
 </style>
@endsection


@section("content")

@include("partials.header")

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>My Account</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="right-sideabr">
                    <h4>Manage Account</h4>
                    <ul class="list-item">
                        <li><a class="active" href="#my-resume">My Resume</a></li>
                        <li><a href="#video">My Video</a></li>
                        <li><a href="#my-cv">My CV</a></li>
                        <li><a href="#certificates">My Certificates <span class="notinumber">{{ $user->attestations->count() }}</span></a></li>
                        @php
                            $sn = 0;
                            for($i=1; $i <=3; $i++){
                                if($user->{'social_link'.$i}){
                                    $sn++;
                                }
                            }
                        @endphp
                        <li><a href="#social-networks">My Social networks <span class="notinumber">{{ $sn }}</span></a></li>
                        <li><a href="#my-link">My Link</a></li>
                        <li><a href="#question-answers">My Answers <span class="notinumber">{{ $user->responses->count() }}</span></a></li>
                        <li><a href="#account-infos">Account infos</a></li>
                        <li><a href="#payments">Payments</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#changePasswordModal">Change Password</a></li>
                        <li><a href="{{ route('logout') }}">Sing Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="inner-box my-resume" id="my-resume">
                    <div class="author-resume">
                        <div class="thumb">
                            @if($user->pic)
                            <img id="change-pic" src="{{ url('files/' . $user->pic->filename) }}" class="my-rounded-circle" style="height:8em; width:8em; " alt="User picture">
                            @else
                            <img id="change-pic" src="{{ asset('assets/default-avatar.png') }}" class="my-rounded-circle" style="height:8em; width:8em;" alt="default avatar">
                            @endif
                        </div>
                        <form style="display:none;" id="form-pic" action="{{ route('edit-user.update-pic') }}" method="POST" enctype="multipart/form-data" >
                            @csrf @method('PUT')
                            <input id="pic_file" type="file" name="pic_file" class="image" accept="image/*" />
                            <input type="hidden" name="x1" value="" />
                            <input type="hidden" name="y1" value="" />
                            <input type="hidden" name="w" value="" />
                            <input type="hidden" name="h" value="" />
                        </form>
                        <div class="row mt-5 mb-5" style="display:none;" id="div-previewimage">
                            <p><img id="previewimage" style="display:none;"/></p>
                            <br>
                            <button class="btn btn-success" id="send_pic_file" >Change image</button>
                            <button class="btn" id="cancel_send_pic_file" >Cancel</button>
                        </div>
                        <div class="author-info">
                            <h3>{{ $user->first_name . ' ' . $user->last_name }} <small>({{ $user->views }} views)</small></h3>
                            <p class="sub-title">{{ $user->activityArea->name }} </p>
                            <p class="sub-title">{{ $user->email }} </p>
                            <p>
                            @if(strtoupper($user->sex) == 'M')
                                <span><i class="fa fa-mars"></i> Man</span>
                            @else
                                <span><i class="fa fa-venus"></i> Woman</span>
                            @endif
                            , {{ date('Y') - \Carbon\Carbon::createFromFormat('Y-m-d',$user->birthdate)->year }} years old
                            </p>
                            <p><span class="address"><i class="lni-map-marker"></i>{{ $user->city->name }}, {{ $user->city->country->name }}</span> <span><i class="ti-phone"></i>{{ $user->phone }}</span></p>
                            <div class="social-link">
                                @php
                                    $social_networks = [
                                        'lni-facebook-filled' => 'facebook',
                                        'lni-twitter-filled' => 'twitter',
                                        'lni-linkedin-fill' => 'linkedin'
                                    ];
                                    $links = [];
                                    for($i=1; $i <=3; $i++){
                                        if($user->{'social_link'.$i}){
                                            $links[] = $user->{'social_link'.$i};
                                        }
                                    }
                                @endphp
                                @foreach($links as $link)
                                    @php $b = false; @endphp
                                    @foreach($social_networks as $lni => $social_network)
                                        @if(strpos(strtolower($link), $social_network) !== false )
                                            <a class="{{ $social_network }}" href="{{$link}}">
                                                <i class="{{ $lni }}"></i>
                                            </a>
                                            @php $b = true; @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    @if(!$b)  <a class="" href="{{$link}}">{{  str_replace('http://','', str_replace('https://','',$link) )[0]  }}</a> @endif
                                @endforeach
                            </div>
                            <p><a href="#" data-toggle="modal" data-target="#editPersonalModal" >Edit</a></p>
                        </div>
                    </div>
                    <div class="about-me item">
                        <h3>Specialization</h3>
                        <p>{{ $user->specialization }}</p>
                        <p><a href="#" data-toggle="modal" data-target="#specializationModal">Edit</a></p>
                    </div>
                    <div id="my-cv" class="work-experence item">
                        <h3>Curriculum Vitae</h3>
                        <h5>{{ $user->cv->mime }}</h5>
                        <span class="date">{{ $user->cv->created_at->toDayDateTimeString() }} </span>
                        <p>
                            @include('file-viewer',['file' => $user->cv, 'class' => 'cv-box'])
                        </p>
                        <p>
                            <a href="{{ url('/files/' . $user->cv->filename) }}" target="_blank">Open</a> |
                            <a href="{{ url('/files/' . $user->cv->filename) }}" download>Download</a> |
                            <a href="#" class="change-cv">Change</a></p>
                        <br>
                        <form style="display:none;" id="form-cv" action="{{ route('edit-user.update-cv') }}" method="POST" enctype="multipart/form-data" >
                            @csrf @method('PUT')
                            <input id="cv_file" type="file" name="cv_file" accept="application/pdf" />
                        </form>
                    </div>
                    <div id="certificates" class="work-experence item">
                        <h3>My Certificates</h3>
                        @forelse ($user->attestations as $item)
                        <h4>{{ $item->name }}</h4>
                        <h5>{{ $item->file->mime }}</h5>
                        <span class="date">{{ $item->created_at->toDayDateTimeString() }}</span>
                        <p>{{ $item->description }}</p>
                        <p>
                            <a href="{{ url( "/files/" . $item->file->filename ) }}" target="_blank">Open</a> |
                            <a href="#" class="del-attestation" data-form="#del-attestation-form{{$item->id}}">Remove</a>
                        </p>
                        <form style="display:none;" id="del-attestation-form{{$item->id}}" action="{{ route('edit-user.del-attestation',[$item->id]) }}" method="POST">@csrf @method('DELETE')</form>
                        <hr>
                        @empty
                        <h4>No uploaded attestaion, certificate or diploma.</h4>
                        @endforelse
                        <p><a href="#" data-toggle="modal" data-target="#addAttestionModal">Add</a></p>
                        <br>
                    </div>
                    <div id="video" class="work-experence item">
                        <h3>My Video</h3>
                        <h5>@if($user->video) {{ $user->video->mime }} @else No uploaded video @endif</h5>
                        <span class="date">@if($user->video) {{ $user->video->created_at->toDayDateTimeString() }} @else No set @endif</span>
                        <p>
                            @if($user->video)
                                @include('file-viewer',['file' => $user->video, 'class' => 'video-box'])
                            @else
                                <video class="video-box" controls >
                                    Please update your browser
                                </video >
                            @endif
                        </p>
                        <p>
                            @if($user->video)
                                <a href="{{ url('/files/' . $user->video->filename) }}" target="_blank">Open</a> |
                                <a href="{{ url('/files/' . $user->video->filename ) }}" download>Download</a> |
                                <a href="#" class="change-video">Change</a> |
                                <a href="#" class="del-video" data-form="#del-video-form">Remove</a>
                                <form style="display:none;" id="del-video-form" action="{{ route('edit-user.del-video') }}" method="POST">@csrf @method('DELETE')</form>
                            @else
                            <a href="#" class="change-video"> Upload </a>
                            @endif
                            <form style="display:none;" id="form-video" action="{{ route('edit-user.video') }}" method="POST" enctype="multipart/form-data" >
                                @csrf @method('PUT')
                                <input id="video_file" type="file" name="video_file" accept="video/*" />
                            </form>
                        </p>
                        <br>
                    </div>
                    <div id="social-networks" class="work-experence item">
                        <h3>My Social Networks</h3>
                        @for($i = 1; $i <= 3; $i++)
                            @if($user->{'social_link'.$i})
                            <a href="{{ $user->{'social_link'.$i} }}" target="_blank"><h4>-> {{ $user->{'social_link'.$i} }}</h4></a>
                            @endif
                        @endfor
                        @if(!$user->social_link1 && !$user->social_link2 && !$user->social_link3)
                            No social network link added
                        @endif
                        <p><a href="#" data-toggle="modal" data-target="#editSocialNetworkModal">Edit</a></p>
                        <br>
                    </div>
                    <div id="my-link" class="work-experence item">
                        <h3>My WORKOO link </h3>
                        <a href="{{ url($user->link) }}"><h4>-> {{ url($user->link) }}</h4></a>
                        <input type="hidden" id="url" value="{{ url($user->link) }}">
                        <a id="copy" href="#">Copy</a>
                        <br>
                    </div>

                    <div id="question-answers" class="education item">
                        <h3>Common asked questions</h3>
                        @foreach($questions as $question)
                        @php $resp = $user->responses->where('question_id', $question->id)->first(); @endphp
                        <h4>{{ $question->label }}</h4>
                        <h5>@if($resp) {{ $resp->content }} @else No answer @endif</h5>
                        @if($resp) <span class="date">Answered {{ $resp->created_at->diffForHumans() }}</span>@endif
                        <p><a href="#" data-toggle="modal" data-target="#questionModal{{$question->id}}">@if($resp) Edit @else Answer @endif</a></p>
                        <br>
                        @endforeach
                    </div>
                    <div id="account-infos" class="education item">
                        <h3>Account infos</h3>
                        <h4>Last update</h4>
                        <p title="{{ $user->updated_at->toDayDateTimeString() }}">{{ $user->updated_at->diffForHumans() }}</p>
                        <hr>
                        <h4>Account created at</h4>
                        <p title="{{ $user->created_at->toDayDateTimeString() }}">{{ $user->created_at->diffForHumans() }}</p>
                        <hr>
                        <h4>Account views</h4>
                        <p>{{ $user->views }}</p>
                    </div>
                    <div id="payments" class="education item">
                        <h3>Payments</h3>
                        @foreach ($user->transactions as $item)
                        @if(strtolower($item->status) == 'completed')
                        <h4>{{ $item->method }}</h4>
                        <h5>$ {{ round($item->amount,2) }}</h5>
                        <p title="{{ $item->created_at->diffForHumans() }}">{{ $item->created_at->toDayDateTimeString() }}</p>
                        <hr>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('edit-user.personal')}}" method="POST" id="editPersonalForm">
    @csrf @method('PUT')
    <div class="modal fade" tabindex="-1" role="dialog" id="editPersonalModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit personal infos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput1">First Name </label>
                        <div class="col-md-9">
                            <input type="text" required class="form-control" required placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput">Last Name </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" required placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="email">Email </label>
                        <div class="col-md-9">
                            <input type="email" id="email" class="form-control" required placeholder="E-mail" name="email" value="{{ $user->email }}">
                            <small style="color:red;display:none;" id="email_exist">This email has already been taken</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="edit-birthdate">Birthdate </label>
                        <div class="col-md-9">
                            <input type="date" id="edit-birthdate" class="form-control" required name="birthdate" value="{{ $user->birthdate }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">Activity area</label>
                        <div class="col-md-9">
                            <select class="form-control" required name="activity_area_id" placeholder="Activity area">
                                <option></option>
                                @foreach ($activities as $item)
                                    <option value="{{ $item->id }}" @if($user->activityArea->id == $item->id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">Gender</label>
                        <div class="col-md-9">
                            <select class="form-control " required name="sex" placeholder="Sexe">
                                <option></option>
                                <option value="M" @if(strtoupper($user->sex) == 'M') selected @endif>Male</option>
                                <option value="F" @if(strtoupper($user->sex) == 'F') selected @endif>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">Country</label>
                        <div class="col-md-9">
                            <select class="form-control" required name="country_id" id="country" placeholder="Country">
                                <option></option>
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}" @if($user->city->country->id == $item->id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">City <i id='city_spinner' style='display:none;' class="fa fa-spinner fa-spin"></i></label>
                        <div class="col-md-9">
                            <select class="form-control" required name="city_id" placeholder="City" id="city">
                                <option value="{{ $user->city->id }}">{{ $user->city->name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="edit-birthdate">Phone </label>
                        <div class="col-md-9">
                            <input type="tel" class="form-control" required name="phone" value="{{ $user->phone }}">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="{{ route('edit-user.specialization')}}" method="POST" id="specializationForm">
    @csrf @method('PUT')
    <div class="modal fade" tabindex="-1" role="dialog" id="specializationModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Specialization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        {{-- <label class="col-md-3 label-control" for="description">Specialization</label> --}}
                        <div class="col-md-12">
                            <textarea name="specialization" required rows="6" placeholder="Your work details..." class="form-control" id="specialization">{{ $user->specialization }}</textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="{{ route('edit-user.add-attestation')}}" method="POST" id="addAttestionForm" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" tabindex="-1" role="dialog" id="addAttestionModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="certif-name">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" required placeholder="Name" name="name">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="certif-name">Choose file</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" required placeholder="Choose file" name="attestation_file" accept="application/pdf, image/*">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="description">Description</label>
                        <div class="col-md-12">
                            <textarea name="description" rows="3" placeholder="Describe your certificate..." class="form-control" ></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="{{ route('edit-user.social-networks')}}" method="POST" id="editSocialNetworkForm" >
    @csrf @method('PUT')
    <div class="modal fade" tabindex="-1" role="dialog" id="editSocialNetworkModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Social networks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-3 label-control">1<sup>st</sup> Social network</label>
                        <div class="col-md-9">
                            <input class="form-control" type="url" value="{{ $user->social_link1 }}" name="social_link1" placeholder="Social network 1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">2<sup>th</sup> Social network</label>
                        <div class="col-md-9">
                            <input class="form-control" type="url" value="{{ $user->social_link2 }}" name="social_link2" placeholder="Social network 2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">3<sup>th</sup> Social network</label>
                        <div class="col-md-9">
                            <input class="form-control" type="url" value="{{ $user->social_link3 }}" name="social_link3" placeholder="Social network 3">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('edit-user.change-password')}}" method="POST" id="changePasswordForm" >
    @csrf
    <div class="modal fade" tabindex="-1" role="dialog" id="changePasswordModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-3 label-control">Current password</label>
                        <div class="col-md-9">
                            <input class="form-control" required type="password" name="current" placeholder="Your current password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">New password</label>
                        <div class="col-md-9">
                            <input class="form-control" minlength="4" id="newpwd" required type="password" name="password" placeholder="Your new password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">New password confirmation</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cfmpwd" required type="password" value="{{ $user->social_link3 }}" name="confirm" placeholder="new password confirmation">
                            <small style="color:red; display:none;">Password and confirmation aren't same</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Change</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

@foreach($questions as $question)
@php $resp = $user->responses->where('question_id', $question->id)->first(); @endphp
<form action="{{ route('edit-user.question', [$question->id])}}" method="POST" id="questionForm{{$question->id}}" >
    @csrf
    <div class="modal fade" tabindex="-1" role="dialog" id="questionModal{{$question->id}}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Answer to question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-12 text-center label-control" style="font-size: 1.5em;color:blue;">{{ $question->label }}</label>
                        <div class="col-md-12">
                            @if($question->type == 'textarea')
                            <textarea name="response" rows="3" placeholder="{{ $question->placeholder }}" class="form-control" >@if($resp){{ $resp->content }}@else{{ $question->pre_value }}@endif</textarea>
                            @elseif($question->type == 'select')
                                @php
                                    $question_options = false;
                                    try{
                                        $question_options = json_decode($question->options);
                                    } catch(\Exception $e){}
                                @endphp
                                @if($question_options)
                                    <select name="response" class="form-control">
                                        @foreach ($question_options as $option)
                                            <option value="{{ $option }}" @if($resp && $option == $resp->content) selected @endif >{{ $option }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input name="response" class="form-control" type="{{ $question->type }}" @if($resp) value="{{ $resp->content }}" @else value="{{ $question->pre_value }}" @endif placeholder="{{ $question->placeholder }}">
                                @endif
                            @else
                            <input name="response" class="form-control" type="{{ $question->type }}" @if($resp) value="{{ $resp->content }}" @else value="{{ $question->pre_value }}" @endif placeholder="{{ $question->placeholder }}">
                            @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endforeach

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            // au clic sur un lien
            $('a').on('click', function(evt){
                var target = $(this).attr('href');
                if(target[0] == '#' && target.length > 1){
                    evt.preventDefault();
                    $('html, body')
                        .stop()
                        .animate({scrollTop: $(target).offset().top-80}, 1000 );
                }
            });


            document.getElementById('copy').onclick = function(e){
                e.preventDefault();
                //copy val to clibord
                var copyText = document.getElementById('url');
                //document.appendChild(copyText)
                //copyText.value = "{{ url($user->link) }}";
                copyText.setAttribute('type','url');
                copyText.select();
                document.execCommand("copy");
                alert("Copied: " + copyText.value);
                copyText.setAttribute('type','hidden');
                copyText.value = "";
            };



            var date = new Date();
            date.setTime(date.getTime() - 1000*60*60*24);
            date = date.toISOString().split('T')[0];
            document.getElementById("edit-birthdate").setAttribute('max', date);
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
                    url: "{{ route('edit-user.ajax-check-email') }}",
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


    </script>

    <script>
        $(document).ready(function(){
            //Video
            $('.change-video').click(function(){
                $('#video_file').click();
            });

            $('#remove-video').click(function(e){
                if(!confirm('Delete your video ?')){
                    e.preventDefault();
                }
            });

             $('#video_file').change(function(){
                $('#form-video').submit();
             });


            //CV
            $('.change-cv').click(function(){
                $('#cv_file').click();
            });

            $('#cv_file').change(function(){
                $('#form-cv').submit();
            });

            //Profile Pic
            /*$('#pic_file').change(function(){
                $('#form-pic').submit();
            });*/
            //Profile Pic
            $('#send_pic_file').click(function(){
                $('#form-pic').submit();
            });

            $('#cancel_send_pic_file').click(function(){
                $('.imgareaselect-outer').hide();
                $('.imgareaselect-border1').hide();
                $('.imgareaselect-border2').hide();
                $('.imgareaselect-border3').hide();
                $('.imgareaselect-border4').hide();
                $('#div-previewimage').hide(500);
            });

            $('#change-pic').click(function(){
                $('#pic_file').click();
            });

            //Delete
            $('.del-attestation, .del-video').click(function(){
                if(confirm('Delete file ?')){
                    $( $(this).data('form') ).submit();
                }
            });

            //Password
            $('#changePasswordForm').submit(function(e){
                var pwd = $(this).find('input[name=password]').val();
                var conf = $(this).find('input[name=confirm]').val();
                if(pwd != conf){
                    e.preventDefault();
                    $(this).find('small').show();
                }else{
                    $(this).find('small').hide();
                }
            });

            $('#changePasswordForm').keyup(function(e){
                var pwd = $(this).find('input[name=password]').val();
                var conf = $(this).find('input[name=confirm]').val();
                if(pwd != conf){
                    $(this).find('small').show();
                    $(this).find('button[type=submit]').attr('disabled','disabled');
                }else{
                    $(this).find('small').hide();
                    $(this).find('button[type=submit]').removeAttr('disabled');
                }
            });
        });
    </script>
    <script>
        jQuery(function($) {

            var p = $("#previewimage");
            $("body").on("change", ".image", function(){

                var imageReader = new FileReader();
                imageReader.readAsDataURL(document.querySelector(".image").files[0]);

                imageReader.onload = function (oFREvent) {
                    p.attr('src', oFREvent.target.result).fadeIn();
                    $('#div-previewimage').show(750);
                };
            });

            $('#previewimage').imgAreaSelect({
                onSelectEnd: function (img, selection) {
                    $('input[name="x1"]').val(selection.x1);
                    $('input[name="y1"]').val(selection.y1);
                    $('input[name="w"]').val(selection.width);
                    $('input[name="h"]').val(selection.height);
                }
            });


        });
    </script>
@endsection
