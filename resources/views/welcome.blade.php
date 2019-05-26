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

@include("partials.nav")

	<div class="container">
		<div class="row space-100">
			<div class="col-lg-7 col-md-12 col-xs-12">
				<div class="contents">
					<h2 class="head-title">WORKOO <br> THE HIRING PLATFORM OF NEW WORLD</h2>
					<p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non.</p>


                    <div class="app-button">
                        <a href="#pricing" class="btn btn-common"><i class="lni-MizTechs"></i><b>I Want </b><br> <span>a new job opportunity</span></a>
                        <a href="#browse-workers" class="btn btn-common btn-effect"><i class="lni-androids"></i><b> I Want </b><br> <span>to Find competences</span></a>
                    </div>

				</div>
			</div>
			<div class="col-lg-5 col-md-12 col-xs-12">
				<div class="intro-img">
					<img src="{{ asset('img/intro.png') }}" alt="">
				</div>
			</div>
		</div>
	</div>
</header>


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
                            <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
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
                <h2 class="section-title">How It Works?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process">
                        <span class="process-icon">
                            <i class="lni-user"></i>
                        </span>
                        <h4>Create an Account</h4>
                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-search"></i>
                        </span>
                        <h4>Complete your Account</h4>
                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-3">
                        <span class="process-icon">
                            <i class="lni-cup"></i>
                        </span>
                        <h4>Apply</h4>
                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonial" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Clients Review</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>
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
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="author">
                                    <div class="img-thumb">
                                        <img src="assets/img/testimonial/img2.png" alt="">
                                    </div>
                                </div>
                                <div class="content-inner">
                                    <p class="description">Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui.</p>
                                    <div class="author-info">
                                        <h2><a href="#">John Doe</a></h2>
                                        <span>Project Menager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="author">
                                    <div class="img-thumb">
                                        <img src="assets/img/testimonial/img3.png" alt="">
                                    </div>
                                </div>
                                <div class="content-inner">
                                    <p class="description">Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui Morbi quam enim, cursus non erat pretium veh icula finibus ex stibulum venenatis viverra dui.</p>
                                    <div class="author-info">
                                        <h2><a href="#">Helen</a></h2>
                                        <span>Engineer</span>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>
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
                                <li>Post 1 Job</li>
                                <li>No Featured Job</li>
                                <li>Edit Your Job Listing</li>
                                <li>Manage Application</li>
                                <li>30-day Expired</li>
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
@endsection
