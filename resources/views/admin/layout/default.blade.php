
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>@yield('title') | Admin Workoo</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/colors/palette-gradient.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: animate.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate/animate.css') }}">
    <!-- END: animate.css -->


    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <style>
      #DataTables_Table_0_filter{
        margin-left: 60%;
      }
    </style>
    @yield('header_styles')
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-success" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-bars font-large-1"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-bars"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon fa fa-expand"></i></a></li>
            </ul>
            @php $logged_user = Sentinel::getUser(); @endphp
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online">
                @if($logged_user->pic)
                  <img src="{{ url('files/' . $logged_user->pic->filename) }}" class="my-rounded-circle" alt="User picture">
                @else
                  <img src="{{ asset('assets/default-avatar.png') }}" class="my-rounded-circle" alt="default avatar">
                @endif
              </span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#">
                    <span class="avatar avatar-online">
                      @if($logged_user->pic)
                        <img src="{{ url('files/' . $logged_user->pic->filename) }}" class="my-rounded-circle" alt="User picture">
                      @else
                        <img src="{{ asset('assets/default-avatar.png') }}" class="my-rounded-circle" alt="default avatar">
                      @endif
                      <span class="user-name text-bold-700 ml-1">{{ $logged_user->first_name . ' ' . $logged_user->last_name }}</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('admin.users.edit',[$logged_user->id]) }}"><i class="fa fa-user"></i> Edit Profile</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{ asset('assets/admin/app-assets/images/backgrounds/02.jpg') }}">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{ asset('img/workoo.png') }}"/>
              <h3 class="brand-text">Workoo</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="navigation-background"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item">
              <a href="{{ url('admin') }}">
                <i class="fa fa-home"></i><span class="menu-title" data-i18n="">Dashboard</span>
            </a>
          </li>

          <li class=" nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title" data-i18n="">Users</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{ route('admin.users.index') }}">List</a></li>
              <li><a class="menu-item" href="{{ route('admin.users.create') }}">Add</a></li>
              <li><a class="menu-item" href="{{ route('admin.users.trashed') }}">Blocked</a></li>
            </ul>
          </li>

          <li class=" nav-item">
              <a href="{{ route('admin.files.index') }}"><i class="fa fa-file"></i><span class="menu-title" data-i18n="">Files</span></a>
          </li>

          <li class=" nav-item">
              <a href="{{ route('admin.questions.index') }}"><i class="fa fa-question"></i><span class="menu-title" data-i18n="">Questions</span></a>
          </li>

          <li class=" nav-item">
              <a href="{{ route('admin.activity_areas.index') }}"><i class="fa fa-bookmark"></i><span class="menu-title" data-i18n="">Activity areas</span></a>
          </li>

          <li class=" nav-item">
              <a href="{{ route('admin.payment_methods.index') }}"><i class="fa fa-credit-card"></i><span class="menu-title" data-i18n="">Payment methods</span></a>
          </li>

          <li class=" nav-item">
              <a href="{{ route('admin.transactions') }}"><i class="fa fa-exchange"></i><span class="menu-title" data-i18n="">Transactions</span></a>
          </li>

          <li class=" nav-item">
              <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i><span class="menu-title" data-i18n="">Logout</span></a>
          </li>

        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2019  &copy; Copyright <a class="text-bold-800 grey darken-2" href="#">Workoo</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
        </ul>
      </div>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/scripts/forms/switch.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}" type="text/javascript"></script>
    <-- END: Page Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/app-assets/js/core/app-menu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/core/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/scripts/customizer.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/jquery.sharrre.js') }}" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS
    <script src="{{ asset('assets/admin/app-assets/js/scripts/pages/dashboard-analytics.min.js') }}" type="text/javascript"></script>
    <!-END: Page JS -->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->
    @include('partials.notify')
    @yield('footer_scripts')
  </body>
  <!-- END: Body-->

</html>
