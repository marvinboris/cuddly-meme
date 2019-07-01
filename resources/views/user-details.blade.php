
@extends("partials.layout")

@section('stylesheet')
 <style>
     .pagination li span {
        border-radius: 30px!important;
        padding: 5px 10px;
        margin: 0 3px;
        min-width: 40px;
        height: 40px;
        line-height: 30px;
        font-weight: 400;
        position: relative;
        font-size: 14px;
        text-transform: uppercase;
        display: block;
        background: #26ae61;
        color: #fff;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #52af62;
        cursor: default;
        background-color: #f2f7fb;
        border-color: #52af62;
    }

    .my-rounded-circle{
        border-radius: 50%!important;
        position: relative;
        right: 2em;
    }

    a.part-time{
        color:red !important;
    }

    a.full-time{
        color: green !important;
    }

    #faq{
        padding-top: 0.5em;
        padding-bottom: 0.5em;
    }

    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 140px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 150%;
        left: 50%;
        margin-left: -75px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }

    #my-row{
        padding: 2em;
        text-align: center;
    }

    #year-b{
        padding-top: 1em;
    }

    .img-wrapper{
        margin-right: 1em;
    }
 </style>
@endsection


@section("content")

@parent



</header>

<div class="page-header">
    <div class="container">
        <div class="row bg-cyan" style="border-radius: 15px;" id="my-row">
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper">
                    <div class="img-wrapper">
                        @if($user->pic)
                        <img src="{{ url('files/' . $user->pic->filename) }}" class="my-rounded-circle" style="height: 9em; width: 9em; object-fit: cover; object-position: top; " alt="User picture">
                        @else
                        <img src="{{ asset('assets/default-avatar.png') }}" class="my-rounded-circle" style="height: 9em; width: 9em; object-fit: cover; object-position: top;" alt="default avatar">
                        @endif
                    </div>

                    <div class="content">
                        <h3 class="product-title">{{ $user->first_name . ' ' . $user->last_name }}</h3>
                        <p class="brand">@if( !empty( $user->activityArea ) ) {{ $user->activityArea->name }} @else "Disabled/Not set" @endif</p>
                        <ul class="fa-ul">
                            <li><i class="fa fa-li fa-phone"></i>{{ $user->phone }}</li>
                            <li><i class="fa fa-li fa-envelope"></i>{{ $user->email }}</li>
                        </ul>
                        <div class="tags">
                            <span><i class="lni-map-marker"></i> {{ $user->city->name }}, {{ $user->city->country->name }}</span>
                            @if(strtoupper($user->sex) == 'M')
                                <span><i class="fa fa-mars"></i> Man</span>
                            @else
                                <span><i class="fa fa-venus"></i> Woman</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12" id="year-b">
                <div class="month-price">
                    <span class="year"><b>{{ date('Y') - \Carbon\Carbon::createFromFormat('Y-m-d',$user->birthdate)->year }}</b></span>
                    <div class="price"> years old</div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="job-detail section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-md-12 col-xs-12">
                {{-- <div class="content-area">
                    <h4>Specialization</h4>
                    <p>{{ $user->specialization }}</p>
                    <h5>User details</h5>
                    <ul>
                        @if($user->email) <li>- <b>Email :</b> {{ $user->email }}</li> @endif
                        @if($user->phone) <li>- <b>Phone :</b> {{ $user->phone }} ({{ $user->city->country->name }})</li> @endif
                        @if($user->birthdate) <li>- <b>Age:</b> {{ date('Y') - \Carbon\Carbon::createFromFormat('Y-m-d',$user->birthdate)->year }} year old</li> @endif
                        @if($c = $user->attestations->count())<li>- <b>Paper:</b> {{$c}} Attestation{{ $c > 1 ? 's':'' }}</li> @endif
                        @if($c = $user->responses->count())<li>- <b>Answers to common quesitons:</b> {{$c}}</li> @endif
                    </ul>
                    @if(count($user->responses) > 0)
                        <h5>Answer to common asked question</h5>
                        <p>These answer above are answer of {{ $user->first_name }} to the common asked question in hiring process</p> --}}
                         {{--<a href="#" class="btn btn-common">Apply job</a> --}}

                        {{-- <div id="faq" class="section pb-45">
                            <div class="container">
                                <div class="row">

                                    @foreach($user->responses as $response)
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$response->id}}">
                                                        {{ $response->question->label }}
                                                    </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{$response->id}}" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <p>{{ $response->content }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endif
                </div> --}}

                
                <div class="inner-box my-resume" id="my-resume">
                    <div class="author-resume">
                        <div class="thumb">
                            @if($user->pic)
                            <img id="change-pic" src="{{ url('files/' . $user->pic->filename) }}" class="my-rounded-circle" style="height: 8em; width: 8em; object-fit: cover; object-position: top; " alt="User picture">
                            @else
                            <img id="change-pic" src="{{ asset('assets/default-avatar.png') }}" class="my-rounded-circle" style="height: 8em; width: 8em; object-fit: cover; object-position: top;" alt="default avatar">
                            @endif
                        </div>
                        <div class="author-info">
                            <h3>{{ $user->first_name . ' ' . $user->last_name }} <small>({{ $user->views }} views)</small></h3>
                            <p class="sub-title">@if( !empty( $user->activityArea ) ) {{ $user->activityArea->name }} @else "Disabled/Not set" @endif  </p>
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
                        </div>
                    </div>
                    <div class="about-me item">
                        <h3>Specialization</h3>
                        <p>{{ $user->specialization }}</p>
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
                            <a href="{{ url('/files/' . $user->cv->filename) }}" download>Download</a>
                        <br>
                    </div>
                    <div id="certificates" class="work-experence item">
                        <h3>My Certificates</h3>
                        @forelse ($user->attestations as $item)
                        <h4>{{ $item->name }}</h4>
                        <h5>{{ $item->file->mime }}</h5>
                        <span class="date">{{ $item->created_at->toDayDateTimeString() }}</span>
                        <p>{{ $item->description }}</p>
                        <p>
                            <a href="{{ url( "/files/" . $item->file->filename ) }}" target="_blank">Open</a>
                        </p>
                        <hr>
                        @empty
                        <h4>No uploaded attestaion, certificate or diploma.</h4>
                        @endforelse
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
                                <a href="{{ url('/files/' . $user->video->filename ) }}" download>Download</a>
                            @endif
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
                        <br>
                    </div>

                    <div id="question-answers" class="education item">
                        <h3>Common asked questions</h3>
                        @foreach($questions as $question)
                        @php $resp = $user->responses->where('question_id', $question->id)->first(); @endphp
                        <h4>{{ $question->label }}</h4>
                        <h5>@if($resp) {{ $resp->content }} @else No answer @endif</h5>
                        @if($resp) <span class="date">Answered {{ $resp->created_at->diffForHumans() }}</span>@endif
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="sideber">
                    <div class="widghet">
                        <h4>User information</h4>
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
                            <li><a href="{{ route('logout') }}">Sign Out</a></li>
                        </ul>
                    </div>
                </div>

                <div class="sideber">
                    <div class="widghet">
                        <h3>Share This User</h3>
                        <div class="share-job">
                            <form method="post" class="subscribe-form">
                                <div class="form-group">
                                    <input type="url" id="url" readonly class="form-control" placeholder="{{ url($user->link) }}">
                                    <button type="button" id="copy" class="btn btn-common sub-btn"><i class="lni-files"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <ul class="mt-4 footer-social">
                                @php
                                    $social_networks = ['facebook','twitter','linkedin'];
                                    $links = [];
                                    for($i=1; $i <=3; $i++){
                                        if($user->{'social_link'.$i}){
                                            $links[] = $user->{'social_link'.$i};
                                        }
                                    }
                                @endphp
                                @foreach($links as $link)
                                    @php $b = false; @endphp
                                    @foreach($social_networks as $social_network)
                                        @if(strpos(strtolower($link), $social_network) !== false )
                                            <li>
                                                <a class="{{ $social_network }}" href="{{$link}}">
                                                    <i class="lni-{{ $social_network }}-filled"></i>
                                                </a>
                                            </li>
                                            @php $b = true; @endphp
                                        @endif
                                    @endforeach
                                    @if(!$b)  <li><a class="" href="{{$link}}">{{  str_replace('http://','', str_replace('https://','',$link) )[0]  }}</a></li> @endif
                                @endforeach
                            </ul>
                            {{-- <div class="meta-tag">
                                <span class="meta-part"><a href="#"><i class="lni-star"></i> Write a Review</a></span>
                                <span class="meta-part"><a href="#"><i class="lni-warning"></i> Reports</a></span>
                                <span class="meta-part"><a href="#"><i class="lni-share"></i> Share</a></span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="social-link">
            <div class="row mt-5">
                <div class="col-md-4"><h4>Curriculum Vitae</h4></div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12 ">
                {{-- @include('file-viewer', ['file' => $user->cv, /*'w' => '100%', 'h' => '500px'*/]) --}}
                <iframe width="100%" height="500px" src="{{  url( "/files/" . $user->cv->filename ) }}"></iframe>
                </div>
            </div>
        </section>

    </div>
</section>


{{--
<section id="social-link">
    @for ($i = 1; $i <= 3; $i++)
        @if($user->{'social_link'.$i})
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <iframe width="100%" height="500px" src="{{ /*url('iframe?url=' . */$user->{'social_link'.$i}/*)*/ }}"></iframe>
            </div>
        </div>
        <br>
        @endif
    @endfor
</section> --}}

<section id="featured" class="section bg-gray pb-45">
    <div class="container">
        <h4 class="small-title text-left">Other information</h4>
        <div class="row">

            @if($user->cv)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="job-featured">
                    <div class="icon">
                        <img src="{{ asset('img/features/img5.png') }}" alt="">
                    </div>
                    <div class="content">
                        <h3><a href="{{ url('files/' . $user->cv->filename) }}" target="_blank">Curriculum Vitae</a></h3>
                        <p class="brand">{{ $user->cv->mime }}</p>
                        <div class="tags">
                            <span><i class="lni-calendar"></i> Posted {{ $user->cv->created_at->diffForHumans() }}</span>
                        </div>
                        <a href="{{ url('files/' . $user->cv->filename) }}" target="_blank" class="full-time">View CV</a>
                    </div>
                </div>
            </div>
            @endif

            @if($user->video)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="job-featured">
                    <div class="icon">
                        <img src="{{ asset('img/features/img2.png') }}" alt="">
                    </div>
                    <div class="content">
                        <h3><a href="{{ url('files/' . $user->video->filename) }}" target="_blank">Short video</a></h3>
                        <p class="brand">{{ $user->video->mime }}</p>
                        <div class="tags">
                            <span><i class="lni-calendar"></i> Posted {{ $user->video->created_at->diffForHumans() }}</span>
                        </div>
                        <a href="{{ url('files/' . $user->video->filename) }}" target="_blank" class="full-time">View video</a>
                    </div>
                </div>
            </div>
            @endif

            @foreach($user->attestations as $attestion)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="job-featured">
                    <div class="icon">
                        <img src="{{ asset('img/features/img6.png') }}" alt="">
                    </div>
                    <div class="content">
                        <h3><a href="{{ url('files/' . $attestion->file->filename) }}" target="_blank">{{ $attestion->name }}</a></h3>
                        <p class="brand"> {{ $attestion->file->mime }}</p>
                        <div class="tags">
                            <span><i class="lni-calendar"></i> Posted {{ $attestion->file->created_at->diffForHumans() }}</span>
                        </div>
                        <a href="{{ url('files/' . $attestion->file->filename) }}" target="_blank" class="{{ $loop->index%2 ? 'full':'part' }}-time">View file</a>
                    </div>
                </div>
            </div>
            @endforeach

            </div>

        </div>
    </div>
</section>
@endsection


@section('scripts')
<script>
    document.getElementById('copy').onclick = function(e){
        //copy val to clibord
        var copyText = document.getElementById("url");
        copyText.value = "{{ url($user->link) }}";
        copyText.select();
        document.execCommand("copy");
        alert("Copied: " + copyText.value);
        copyText.value = "";
    };
</script>
@endsection
