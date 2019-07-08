
@extends("partials.layout")

@section('stylesheet')
 <style>
 </style>
@endsection


@section("content")

@parent

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Login</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    <h3>Login</h3>
                    <form class="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-user"></i>
                                <input type="email" required id="sender-email" class="form-control" name="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input type="password" required class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        
                        <div class="form-group">
                             <div class="col-md-12 pull-center">
                                <div class="g-recaptcha" data-sitekey="6LeGoaYUAAAAAF_2hHldkzXHKYBwWCxZgKoARGll"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                             </div> 
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" name="remember-me" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Keep Me Signed In</label>
                        </div>
                        <button class="btn btn-common log-btn">Submit ?</button>
                    </form>
                    <ul class="form-links">
                        <li class="text-center"><a href="{{ route('register') }}">Don't have an account?</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')

<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
