@extends("partials.layout")

@section("content")

@parent

    <div id="subscribe" class="section bg-cyan">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="img-sub">
                        <img class="img-fluid" src="{{ asset('img/main/achievement.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="subscribe-form">
                        <div class="form-wrapper">
                            <div class="sub-title">
                                <h3 style="font-weight:normal !important;font-size:36px !important">WORKOO.NET: HR OTHERWISE ...</h3>
                                <p>
                                Workoo is a human resources exhibition platform, a saas designed for 
                                the easy enhancement of skills of all kinds. Only the essenciel is displayed, it is not a 
                                social network. People pay $ 1 a year to be professionally exposed worldwide.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="browse-workers" class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-wrapper">
                        <div>
                            <h3 class="section-title" style="font-weight:normal !important;font-size:36px !important">THE PROBLEM THAT GENERATES THE IDEA: AN INCOMPLETE PROCESS ...</h3>
                            <p>
                                Information is the only weapon of economic wars
                                of this time, and more importantly the enhancement of information.
                                Workoo is now the leader of a sector
                                Bitterly behind the technological advance of the world,
                                which of course is expensive for humanity. Indeed,
                                very often hired under an instant need,
                                the staff is recruited on the basis of some lively elements,
                                while it is still sorely lacking information about
                                their real abilities. Too late often when we get there
                                account, we do with and we adapt. But it's not at the post
                                to adapt to the incompetence of the person,
                                it's up to the person to be adaptable to the job. Thus, the profiles
                                genuinely correspondents are referred to sectors that are inappropriate to their skills and
                                abilities by '' what-to? '', and the vicious circle begins again.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="img-thumb">
                        <img class="img-fluid" src="{{ asset('img/main/business.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div id="subscribe" class="section bg-cyan">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="img-sub">
                        <img class="img-fluid" src="{{ asset('img/main/man.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="subscribe-form">
                        <div class="form-wrapper">
                            <div class="sub-title">
                                <h3 class="section-title" style="font-weight:normal !important;font-size:36px !important">AN EFFICIENT SOLUTION: HR OTHERWISE ...</h3>
                                <p>
                                     For humanity we have totally redesigned the model of
                                     direct recruitment, since the best way to predict
                                     future is to create it.
                                     We started on the basis of real information
                                     necessary for the development of a skill,
                                     what does it matter at what level it is? We have
                                     a set, which effectively responds to all
                                     fields of view that leads to a recruitment of profiles
                                     corresponding for the success of all.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="browse-workers" class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-wrapper">
                        <div>
                            <h3>Search talents</h3>
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

    <section id="testimonial" class="section">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Clients Review</h3>
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
                        </div>
                        <div class="plan-button">
                            <a href="{{ route('register') }}" class="btn btn-border">Get Started</a>
                        </div>
                    </div>
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
