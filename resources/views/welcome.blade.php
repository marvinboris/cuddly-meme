@extends("partials.layout")

@section("content")

@parent

    <div id="subscribe" class="section bg-cyan">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="img-sub">
                        <img class="img-fluid" src="{{ asset('img/main/office-1081807_1920.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="subscribe-form">
                        <div class="text-wrapper">
                            <div>
                                <h4>WORKOO.NET: HR OTHERWISE ...</h4>
                                <p class="lead">
                                    Workoo.net is a human ressources exhibition platform, a Saas designed to easily enhance competences of all kind. Only the essencial is displayed, it is not a social media. People pay 1 Dollar per year to be professionally exposed worlwide. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="browse-workerss" class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="img-thumb">
                        <img class="img-fluid" src="{{ asset('img/main/achievement.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 order-2 order-lg-1">
                    <div class="subscribe-form">
                        <div class="text-wrapper">
                            <div>
                                <h4>THE PROBLEM THAT GENERATES THE IDEA:AN INCOMPLETE PROCESS...</h4>
                                <p class="lead">
                                    We created workoo.net because we knew how difficult it was to access your dream job, as also inappropropriate competence are 80% of compagnies growth issues.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div id="subscribes" class="section bg-cyan">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="img-sub">
                        <img class="img-fluid" src="{{ asset('img/main/business.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="subscribe-form">
                        <div class="form-wrapper">
                            <div>
                                <h4 class="section-title">AN EFFICIENT SOLUTION: HR OTHERWISE ...</h4>
                                <p class="lead">
                                    Very often hired under an instant need, the staff is recruited on the basis of some lively elements, while it is still sorely lacking information about their real abilities. Too late often when we realise, we do with and we adapt. But it's not the post to adapt to the incompetence of the person, it's up to the person to be gradually adaptable to the job.<br>
                                    Then we collected a set of information, which effectively responds to all the necessary field of vision for a success recruitment of the corresponding profiles. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="browse-workerss" class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="img-thumb">
                        <img class="img-fluid" src="{{ asset('img/main/man.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 order-2 order-lg-1">
                    <div class="subscribe-form">
                        <div class="text-wrapper">
                            <div>
                                {{-- <h4>THE PROBLEM THAT GENERATES THE IDEA:AN INCOMPLETE PROCESS...</h4> --}}
                                <p class="lead">
                                    You, the Job Opportunity seekers, are asked where your skills and your personality flourish.<br>
                                    The recruiter finds great profiles, based on deeply clear and precised information.                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div id="browse-workers" class="section bg-cyan">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 order-1 order-lg-2">
                    <div class="img-thumb">
                        <img class="img-fluid" src="{{ asset('img/search.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 order-2 order-lg-1">
                    <div class="text-wrapper">
                        <div>
                            <h4>Search talents</h4>
                            <p class="lead">
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
            </div>
        </div>
    </div>  

    <section id="testimonial" class="section">
        <div class="container">
            <div class="section-header">
                <h4 class="section-title">Clients Review</h4>
                <p class="lead">
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
                <p class="lead">Single pricing plan to rule them all</p>
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
