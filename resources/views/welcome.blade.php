@extends("partials.layout")

@section("content")

@php
    function name2lni($activity_area_name) {
        $tabs = ['home','world','book','display','brush','heart','funnel','cup'];
        $lni = 'ln-';
        $fa = 'fa fa-';
        switch ($activity_area_name) {
            case 'value':
                # code...
                break;

            default:
                # code...
                break;
        }
    }
@endphp

@include("partials.header")

    <section class="category section bg-gray">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Browse Activity Areas</h2>
                <p>Most popular activity areas, sorted by popularity</p>
            </div>
            <div class="row">
{{--                 <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-1">
                            <i class="fa fa-home 3x"></i>
                        </div>
                        <h3>Finance</h3>
                        <p>(4286 jobs)</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-2">
                            <i class="lni-world"></i>
                        </div>
                        <h3>Sale/Markting</h3>
                        <p>(2000 jobs)</p>
                    </a>
                </div> --}}
                @foreach ($activityAreas as $item)
                @if($loop->index == 12) @break @endif
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-{{ ($loop->index % 8) + 1 }}">
                            <i class="lni-book"></i>
                        </div>
                        <h3>{{ $item->name }}</h3>
                        <p>({{ $item->users->count() }} users)</p>
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </section>
    <div id="browse-workers" class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-wrapper">
                        <div>
                            <h3>500+ talents</h3>
                            <p>
                                Search all the jobs seeker on the platform.Find the best talents that suit well your needs. 
                                The right talent is out there.
                            </p>
                            {{-- <a class="btn btn-common" href="#">Search worker</a> --}}

                            <div class="job-search-form">
                                <form action="{{ route('search-worker') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-5 col-md-5 col-xs-12">
                                            <div class="form-group">
                                                <div class="search-category-container">
                                                    <label class="styled-select">
                                                        <select name="a" required>
                                                            <option value="">Choose activity area</option>
                                                            @foreach ($activityAreas as $item)
                                                            <option value="{{ $item->id }}" title="{{ $item->description }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-5 col-md-5 col-xs-12">
                                            <div class="form-group">
                                                <div class="search-category-container">
                                                    <input class="form-control" required name="l" id="city" type="text" placeholder="Location" list="cities">
                                                    <datalist id="cities">
                                                    </datalist>
                                                </div>
                                                <i class="lni-map-marker"></i>
                                            </div>
                                        </div>


                                        <div class="col-lg-2 col-md-2 col-xs-12">
                                            <button type="submit" class="button"><i class="lni-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="img-thumb">
                        <img class="img-fluid" src="{{ asset('img/search.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="how-it-works section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">How It Works - For Job seekers</h2>
                <p>
                    
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process">
                        <span class="process-icon">
                            <i class="lni-user"></i>
                        </span>
                        <h4>Create an Account</h4>
                        <p>
                           Create and account in the platform, with basic information
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-world"></i>
                        </span>
                        <h4>Make a subscription payment</h4>
                        <p> 
                            Pay only $ {{ $setting->account_price }} for a year 
                            in order to get your profile professionnally exposed in the world.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-3">
                        <span class="process-icon">
                            <i class="lni-cup"></i>
                        </span>
                        <h4>Complete your profile </h4>
                        <p>
                            Complete your profile and get your next job offer right into your box  
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-works section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">How It Works - For Employers </h2>
                <p>
                    
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-search"></i>
                        </span>
                        <h4>Research the talent</h4>
                        <p>
                            Use our powerful search engine and get right profile for your job offer
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-comments"></i>
                        </span>
                        <h4>Get in touch </h4>
                        <p>
                            Get in touch with the matched person, for you to discuss about 
                            modalities
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-bar-chart"></i>
                        </span>
                        <h4>Grow your business</h4>
                        <p>
                            Make your business grow with the talent,
                            after hiring.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-works section bg-gray">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Accepted payment methods </h2>
                <p>
                    
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-mastercard"></i>
                            <i class="lni-visa"></i>
                        </span>
                        <h4>Visa - mastercard</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-bitcoin"></i>
                        </span>
                        <h4>Cryptocurrencies</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-wallet"></i>
                        </span>
                        <h4>Mobile Money</h4> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="testimonial" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Clients Review</h2>
                <p>
                    What they are saying about us.
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div id="testimonials" class="touch-slider owl-carousel">
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="author">
                                    <div class="img-thumb">
                                        <img src="assets/img/testimonial/img1.png" alt="">
                                    </div>
                                </div>
                                <div class="content-inner">
                                    <p class="description">Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui.</p>
                                    <div class="author-info">
                                        <h2><a href="#">Jessica</a></h2>
                                        <span>Senior Accountant</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="pricing" class="section bg-gray">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Pricing Plan</h2>
                <p>Single pricing plan to rule them all</p>
            </div>
            <div class="row pricing-tables">
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="pricing-table border-color-defult">
                        <div class="pricing-details">
                            <div class="icon">
                                <i class="lni-rocket"></i>
                            </div>
                            <h2>Professional</h2>
                            <ul>
                                <li>Get your profile featured</li>
                                <li>Profile view counts</li>
                                <li>Get notified on new jobs</li>
                                <li>Edit Your Job Listing</li>
                                <li>1 year Expired</li>
                            </ul>
                            <div class="price">
                                <span>$</span>
                                {{ $setting->account_price }}
                                <span>/
                                    @if($setting->account_time%12 == 0)
                                        {{ $setting->account_time/12 > 1 ? $setting->account_time : '' }} Year
                                    @else
                                        {{ $setting->account_time }} Month
                                    @endif
                                </span>
                            </div>
                            <div class="">
                                  <i class="lni-visa"></i>
                                  <i class="lni-bitcoin"></i>
                                  <i class="lni-dollar"></i>
                            </div> 
                        </div>
                        <div class="plan-button">
                            <a href="{{ route('register') }}" class="btn btn-border">Get Started</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="pricing-table pricing-active border-color-red">
                        <div class="pricing-details">
                            <div class="icon">
                                <i class="lni-drop"></i>
                            </div>
                            <h2>Advance</h2>
                            <ul>
                                <li>Post 1 Job</li>
                                <li>No Featured Job</li>
                                <li>Edit Your Job Listing</li>
                                <li>Manage Application</li>
                                <li>30-day Expired</li>
                            </ul>
                            <div class="price"><span>$</span>20<span>/Month</span></div>
                        </div>
                        <div class="plan-button">
                            <a href="#" class="btn btn-border">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="pricing-table border-color-green">
                        <div class="pricing-details">
                            <div class="icon">
                                <i class="lni-briefcase"></i>
                            </div>
                            <h2>Premium</h2>
                            <ul>
                                <li>Post 1 Job</li>
                                <li>No Featured Job</li>
                                <li>Edit Your Job Listing</li>
                                <li>Manage Application</li>
                                <li>30-day Expired</li>
                            </ul>
                            <div class="price"><span>$</span>40<span>/Month</span></div>
                        </div>
                        <div class="plan-button">
                            <a href="#" class="btn btn-border">Get Started</a>
                        </div>
                    </div>
                </div> --}}
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


    <script>
        $(document).ready(function(){
            // au clic sur un lien
            $('a').on('click', function(evt){
                var target = $(this).attr('href');
                if(target[0] == '#' && target.length > 1){
                    evt.preventDefault();
                    $('html, body')
                        .stop()
                        .animate({scrollTop: $(target).offset().top}, 1000 );
                }
            });
        });
    </script>
@endsection
