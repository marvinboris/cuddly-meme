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
 </style>
@endsection


@section("content")

@include("partials.header")


<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Search Worker {{-- @if(($total) > 0) ({{ $total }} found ) @endif --}}</h3>
                </div>
                <div class="job-search-form bg-cyan job-featured-search">
                    <form action="{{ route('search-worker') }}" method="GET">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <div class="search-category-container">
                                        <label class="styled-select">
                                            <select name="a">
                                                <option value="">Choose activity area</option>
                                                @foreach ($activityAreas as $item)
                                                <option value="{{ $item->id }}" title="{{ $item->description }}" @if($item->id == $activity_id) selected @endif>
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <div class="search-category-container">
                                        <input class="form-control" name="l" id="city" type="text" placeholder="Location" list="cities" value="{{ $location }}">
                                        <datalist id="cities">
                                        </datalist>
                                    </div>
                                    <i class="lni-map-marker"></i>
                                </div>
                            </div>
                            @csrf
                            <div class="col-lg-1 col-md-1 col-xs-12">
                                <button type="submit" class="button"><i class="lni-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<div id="content">
    <div class="container">
        <div class="row">

            @forelse ($users as $user)

            <div class="col-lg-12 col-md-6 col-xs-12">
                <div class="manager-resumes-item">
                    <div class="manager-content">
                        <a href="{{ $user->pic ? url('files/' . $user->pic->filename) : '#' }}" {{ $user->pic ? "target='_blank'":"" }}>
                            @if($user->pic)
                                <img src="{{ url('files/' . $user->pic->filename) }}" class="resume-thumb" alt="User picture">
                            @else
                                <img src="{{ asset('assets/default-avatar.png') }}" class="resume-thumb" alt="default avatar">
                            @endif
                        </a>
                        <div class="manager-info">
                            <div class="manager-name">
                                <h4><a href="{{ url($user->link) }}">{{ $user->first_name . ' ' . $user->last_name }}</a></h4>
                                <h5>{{ $user->activityArea->name }}</h5>
                            </div>
                            <div class="manager-meta">
                                <span class="location"><i class="ti-location-pin"></i> {{ $user->city->name }}, {{ $user->city->country->name }}</span>
                                <span class="rate"><i class="ti-time"></i> {{ date('Y') - \Carbon\Carbon::createFromFormat('Y-m-d',$user->birthdate)->year }} year old</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-body">
                        <div class="content">
                            <p>{{ $user->specialization }}</p>
                        </div>
                        <div class="resume-skills">
                            <div class="tag-list float-left">
                                @if($user->cv) <span>CV</span> @endif
                                @if($user->video) <span>Video</span> @endif
                                @foreach ($user->attestations as $attestation)
                                    @if($loop->index < 10)
                                    <span title="{{ $attestation->description }}">{{ $attestation->name }}</span>
                                    @else
                                    <span title="See more in profile">...</span>
                                    @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="resume-exp float-right">
                                <span style="cursor:default;" class="btn btn-common btn-xs">{{ strtoupper($user->sex) == 'M' ? 'Man':'Woman'  }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12 col-md-6 col-xs-12">
                <h1 class="text-center">No user found</h1>
            </div>
            @endforelse
            <div class="col-lg-12 col-md-12 col-xs-12">
                <br>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        // Ajax to perform autocomplet on city form input
        $(document).ready(function(){
            $('#city').keyup(function(){
                var entry = $(this).val();
                if(!entry)
                    return;
                $.ajax({
                   url: "{{ route('ajax-search-cities') }}",
                   data: 'q='+ entry + '&_token={{ csrf_token() }}',
                   method: 'POST',
                   success: function(data){
                       var html = '';
                       data.forEach(city => {
                           html += "<option value='"+city+"'>";
                       });
                       $('#cities').html(html);
                   }
                });
            });
        });

    </script>
@endsection
