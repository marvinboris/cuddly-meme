@extends("partials.layout")

@section("content")

@include("partials.nav")

    <section class="category section bg-gray">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Browse Categories</h2>
                <p>Most popular categories of portal, sorted by popularity</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-1">
                            <i class="lni-home"></i>
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
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-3">
                            <i class="lni-book"></i>
                        </div>
                        <h3>Education/Training</h3>
                        <p>(1450 jobs)</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-4">
                            <i class="lni-display"></i>
                        </div>
                        <h3>Technologies</h3>
                        <p>(5100 jobs)</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-5">
                            <i class="lni-brush"></i>
                        </div>
                        <h3>Art/Design</h3>
                        <p>(5079 jobs)</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-6">
                            <i class="lni-heart"></i>
                        </div>
                        <h3>Healthcare</h3>
                        <p>(3235 jobs)</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-7">
                            <i class="lni-funnel"></i>
                        </div>
                        <h3>Science</h3>
                        <p>(1800 jobs)</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="browse-jobs.html">
                        <div class="icon bg-color-8">
                            <i class="lni-cup"></i>
                        </div>
                        <h3>Food Services</h3>
                        <p>(4286 jobs)</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div id="browse-jobs" class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-wrapper">
                        <div>
                            <h3>500+ talents</h3>
                            <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
                            <a class="btn btn-common" href="#">Search jobs</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="img-thumb">
                        <img class="img-fluid" src="assets/img/search.png" alt="">
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
                        <h4>Search Jobs</h4>
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
                <div class="col-lg-4 col-md-4 col-xs-12">
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
                            <div class="price"><span>$</span>0<span>/Month</span></div>
                        </div>
                        <div class="plan-button">
                            <a href="#" class="btn btn-border">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
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
                </div>
            </div>
        </div>
    </div>

@endsection