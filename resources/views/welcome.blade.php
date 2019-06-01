@extends("partials.layout")

@section("content")

@include("partials.header")

    <div id="subscribe" class="section bg-cyan">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="img-sub">
                        <img class="img-fluid" src="{{ asset('img/sub.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="subscribe-form">
                        <div class="form-wrapper">
                            <div class="sub-title">
                                <h3>WORKOO.NET: LES RH AUTREMENT...</h3>
                                <p>
                                    Workoo est une plate forme
                                    d’exposition des ressources
                                    humaines, un saas conçu
                                    pour la mise en valeur
                                    facile des compétences de
                                    tout bord. Seul l’essenciel y
                                    est affiché, ce n’est pas un
                                    réseau social. Les gens
                                    payent $1 par an pour être
                                    professionnellement
                                    exposés dans le monde
                                    entier.
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
                            <h3 class="section-title">LE PROBLEME QUI GÉNÈRE L’IDEE: UN PROCESSUS INCOMPLET...</h3>
                            <p>
                            L’information est la seule arme des guerres économiques
                            de ce temps, et plus encore la mise en valeur de l’information.
                            Workoo se veut aujourd'hui leader moteur d’un secteur
                            Amèrement en retard sur l’avancé technologique du monde,
                            ce qui naturellement coute cher à l’humanité. En effet,
                            très souvent embauchés sous le coup d’un besoin instantané,
                            le personnel est recruté sur la base de quelques éléments vifs,
                            alors qu’il manque encore cruellement d’informations sur
                            leurs aptitudes réelles. Trop tard souvent quand on s’en rend
                            compte, on fais avec et on s’adapte. Or, ce n’est pas au poste
                            de s’adapter aux incompétences de la personne,
                            c’est à la personne d’être compatiblement évolutive face au poste. Ainsi, les profils
                            véritablement correspondants sont renvoyés dans des secteurs inappropriés à leurs compétences et
                            capacités par ‘’que-faire?’’, et le cercle vicieux recommence.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="img-thumb">
                        <img class="img-fluid" src="{{ asset('img/slider/img-1.png') }}" alt="">
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
                        <img class="img-fluid" src="{{ asset('img/sub.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="subscribe-form">
                        <div class="form-wrapper">
                            <div class="sub-title">
                                <h3 class="section-title">UNE SOLUTION EFFICIENTE: LES RH AUTREMENT...</h3>
                                <p>
                                    Pour l’humanité nous avons totalement repensé le modèle du
                                    recrutement direct, puisque ‘’la meilleur façon de prédire le
                                    futur est de le créer’’.
                                    Nous sommes partis sur les bases des réelles informations
                                    nécessaires pour la mise en valeur d’une compétence,
                                    qu’importe à quel niveau elle se situe. Nous avons ainsi
                                    récencés un ensemble, qui répondent efficacement à tout le
                                    champs de vision qui conduit à un recrutement des profils
                                    correspondants pour le succès de tous.  
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

    <section class="category section bg-gray">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Browse Activity Areas</h2>
                <p>Most popular activity areas, sorted by popularity</p>
            </div>
            <div class="row">
                @foreach ($activityAreas as $item)
                @if($loop->index == 8) @break @endif
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
                <div class="col-12 text-center mt-4">
                    <a href="{{ route('activity-areas') }}" class="btn btn-common">Browse All</a>
                </div>
            </div>
        </div>
    </section>
    
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
