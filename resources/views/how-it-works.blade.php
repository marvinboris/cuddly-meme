@extends("partials.layout")

@section("content")
@parent
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>How it works </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="how-it-works section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">For Job seekers</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process">
                        <span class="process-icon">
                            <i class="lni-user"></i>
                        </span>
                        <h4>Create an Account</h4>
                        <p>
                           Create and account in the platform, with basic information.
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
                            Pay only $ {{ $setting->account_price }} for a year in order to get your profile professionally exposed in the world. Pay with all payment methods from Mobile Money to Visa.
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
                            Complete your profile and get your next job offer right into your box.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-works section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">For Employers </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
                        <span class="process-icon">
                            <i class="lni-search"></i>
                        </span>
                        <h4>Research the talent</h4>
                        <p>
                            Use our powerful search engine and get right profile for your job offer.
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
                            modalities.
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
@endsection