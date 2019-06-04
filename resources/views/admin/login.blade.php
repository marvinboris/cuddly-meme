
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Workoo- The hiring paltform of the new world">
    <meta name="keywords" content="Job, Hiring,Cameroon,Africa">
    <meta name="author" content="Workoo">
    <title>Connexion - Admin Workoo</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="{{ asset('assets/admin/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/app-assets/images/ico/favicon.ico') }}">
    <link href="{{ asset('assets/admin/fonts.googleapis.com/css93c2.css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700') }}" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/plugins/forms/switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/colors/palette-switch.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/components.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/pages/login-register.min.css') }}">

    <!-- END: Page CSS-->

    <!-- BEGIN: animate.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate/animate.css') }}">
    <!-- END: animate.css -->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                        <img src="{{ asset('img/logo2.png') }}" alt="branding logo">
                    </div>
                    <div class="font-large-1  text-center">
                        Connexion | Admin
                    </div>
                </div>
                <div class="card-content">

                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.postSignin') }}" novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control round" id="user-name" name="email" placeholder="Votre E-mail" required>
                                <div class="form-control-position">
                                    <i class="fa fa-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control round" id="user-password" name="password" placeholder="Votre Mot de passe" required>
                                <div class="form-control-position">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </fieldset>
                            {{-- <input type="checkbox" name="remember-me" value="1"/> Se souvenir de moi --}}
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">

                                </div>
                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Mot de passe oublié ?</a></div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Connexion</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/scripts/forms/switch.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/app-assets/js/core/app-menu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/core/app.min.js') }}" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/admin/app-assets/js/scripts/forms/form-login-register.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->
    @include('partials.notify')
  </body>
</html>
