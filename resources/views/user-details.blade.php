
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
 </style>
@endsection


@section("content")

@parent



</header>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper">
                    <div class="img-wrapper">
                        @if($user->pic)
                        <img src="{{ url('files/' . $user->pic->filename) }}" class="my-rounded-circle" style="height:8em; width:8em; " alt="User picture">
                        @else
                        <img src="{{ asset('assets/default-avatar.png') }}" class="my-rounded-circle" style="height:8em; width:8em;" alt="default avatar">
                        @endif
                    </div>
                    <div class="content">
                        <h3 class="product-title">{{ $user->first_name . ' ' . $user->last_name }}</h3>
                        <p class="brand">{{ $user->activityArea->name }}</p>
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
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="month-price">
                    <span class="year"><b>{{ date('Y') - \Carbon\Carbon::createFromFormat('Y-m-d',$user->birthdate)->year }}</b></span>
                    <div class="price"> year old</div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="job-detail section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="content-area">
                    <h4>Specialization</h4>
                    <p>{{ $user->specialization }}</p>
                    <h5>User details</h5>
                    <ul>
                        @if($user->email) <li>- <b>Email:</b> {{ $user->email }}</li> @endif
                        @if($user->phone) <li>- <b>Phone:</b> {{ $user->phone }} ({{ $user->city->country->name }})</li> @endif
                        @if($user->birthdate) <li>- <b>Age:</b> {{ date('Y') - \Carbon\Carbon::createFromFormat('Y-m-d',$user->birthdate)->year }} year old</li> @endif
                        @if($c = $user->attestations->count())<li>- <b>Paper:</b> {{$c}} Attestation{{ $c > 1 ? 's':'' }}</li> @endif
                        @if($c = $user->responses->count())<li>- <b>Answers to common quesitons:</b> {{$c}}</li> @endif
                    </ul>
                    @if(count($user->responses) > 0)
                        <h5>Answer to common asked question</h5>
                        <p>These answer above are answer of {{ $user->first_name }} to the common asked question in hiring process</p>
                         {{--<a href="#" class="btn btn-common">Apply job</a> --}}

                        <div id="faq" class="section pb-45">
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
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="sideber">
                    <div class="widghet">
                        <h3>Curriculum Vitae</h3>
                        <div class="maps">
                            <div id="map" class="map-full">
                                @include('file-viewer', ['file' => $user->cv])
                            </div>
                        </div>
                    </div>
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
    </div>
</section>






<section id="featured" class="section bg-gray pb-45">
    <div class="container">
        <h4 class="small-title text-left">Others infos</h4>
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
