
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
    <link rel="apple-touch-icon" href="{{ asset('assets/admin/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/app-assets/images/ico/favicon.ico') }}">
    <link href="{{ asset('assets/admin/fonts.googleapis.com/css93c2.css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700') }}" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/plugins/forms/switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/colors/palette-switch.min.css') }}">
   <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
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
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/pages/chat-application.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/pages/dashboard-analytics.min.css') }}">
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
  <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="dropdown nav-item mega-dropdown d-none d-md-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
                <ul class="mega-dropdown-menu dropdown-menu row">
                  <li class="col-md-2">
                    <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="ft-link"></i> Quick Links</h6>
                    <ul>
                      <li><a class="my-1" href="chat-application.html"><i class="ft-home"></i> Chat</a></li>
                      <li><a class="my-1" href="table-bootstrap.html"><i class="ft-grid"></i> Tables</a></li>
                      <li><a class="my-1" href="chartist-charts.html"><i class="ft-bar-chart"></i> Charts</a></li>
                      <li><a class="my-1" href="gallery-grid.html"><i class="ft-sidebar"></i> Gallery</a></li>
                    </ul>
                  </li>
                  <li class="col-md-3">
                    <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="ft-star"></i> My Bookmarks</h6>
                    <ul class="ml-2">
                      <li class="list-style-circle"><a class="my-1" href="card-bootstrap.html">
                                                Cards</a></li>
                      <li class="list-style-circle"><a class="my-1" href="full-calender.html"> Calender</a></li>
                      <li class="list-style-circle"><a class="my-1" href="invoice-template.html"> Invoice</a></li>
                      <li class="list-style-circle"><a class="my-1" href="users-contacts.html"> Contact</a></li>
                    </ul>
                  </li>
                  <li class="col-md-3">
                    <h6 class="dropdown-menu-header text-uppercase"><i class="ft-layers"></i> Recent Products</h6>
                    <div class="carousel slide pt-1" id="carousel-example" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="d-block w-100" src="{{ asset('assets/admin/app-assets/images/carousel/08.jpg') }}" alt="First slide"></div>
                        <div class="carousel-item"><img class="d-block w-100" src="{{ asset('assets/admin/app-assets/images/carousel/03.jpg') }}" alt="Second slide"></div>
                        <div class="carousel-item"><img class="d-block w-100" src="{{ asset('assets/admin/app-assets/images/carousel/01.jpg') }}" alt="Third slide"></div>
                      </div><a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev"><span class="la la-angle-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next"><span class="la la-angle-right icon-next" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                      <h5 class="pt-1">Special title treatment</h5>
                      <p>Jelly beans sugar plum.</p>
                    </div>
                  </li>
                  <li class="col-md-4">
                    <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="ft-thumbs-up"></i> Get in touch</h6>
                    <form class="form form-horizontal pt-1">
                      <div class="form-body">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label" for="inputName1">Name</label>
                          <div class="col-sm-9">
                            <div class="position-relative has-icon-left">
                              <input class="form-control" id="inputName1" type="text" placeholder="John Doe">
                              <div class="form-control-position pl-1"><i class="ft-user"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label" for="inputContact1">Contact</label>
                          <div class="col-sm-9">
                            <div class="position-relative has-icon-left">
                              <input class="form-control" id="inputContact1" type="text" placeholder="(123)-456-7890">
                              <div class="form-control-position pl-1"><i class="ft-smartphone"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>
                          <div class="col-sm-9">
                            <div class="position-relative has-icon-left">
                              <input class="form-control" id="inputEmail1" type="email" placeholder="john@example.com">
                              <div class="form-control-position pl-1"><i class="ft-mail"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label" for="inputMessage1">Message</label>
                          <div class="col-sm-9">
                            <div class="position-relative has-icon-left">
                              <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                              <div class="form-control-position pl-1"><i class="ft-message-circle"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 mb-1">
                            <button class="btn btn-danger float-right" type="button"><i class="ft-arrow-right"></i> Submit</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
              <li class="dropdown d-none d-md-block mr-1">
                <a class="dropdown-toggle nav-link" id="apps-navbar-links" href="#" data-toggle="dropdown">
                 Apps
                </a>
                <div class="dropdown-menu">
                  <div class="arrow_box"><a class="dropdown-item" href="email-application.html"><i class="ft-user"></i> Email</a><a class="dropdown-item" href="chat-application.html"><i class="ft-mail"></i> Chat</a><a class="dropdown-item" href="project-summary.html"><i class="ft-briefcase"></i> Project Summary            </a><a class="dropdown-item" href="full-calender.html"><i class="ft-calendar"></i> Calendar            </a></div>
                </div>
              </li>
              <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                <ul class="dropdown-menu">
                  <li class="arrow_box">
                    <form>
                      <div class="input-group search-box">
                        <div class="position-relative has-icon-right full-width">
                          <input class="form-control" id="search" type="text" placeholder="Search here...">
                          <div class="form-control-position navbar-search-close"><i class="ft-x"></i></div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                  <div class="arrow_box"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i> Russian</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                </div>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell bell-shake" id="notification-navbar-link"></i><span class="badge badge-pill badge-sm badge-danger badge-up badge-glow">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <div class="arrow_box_right">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>
                    </li>
                    <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-share info font-medium-4 mt-2"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading info">New Order Received</h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Lorem ipsum dolor sit amet!</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">3:30 PM</time></small>
                          </div>
                        </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-save font-medium-4 mt-2 warning"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading warning">New User Registered</h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Aliquam tincidunt mauris eu risus.</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">10:05 AM</time></small>
                          </div>
                        </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-repeat font-medium-4 mt-2 danger"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading danger">New Purchase</h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Lorem ipsum dolor sit ametest?</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Yesterday</time></small>
                          </div>
                        </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-shopping-cart font-medium-4 mt-2 primary"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading primary">New Item In Your Cart</h6><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                          </div>
                        </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-heart font-medium-4 mt-2 info"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading info">New Sale</h6><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                          </div>
                        </div></a></li>
                    <li class="dropdown-menu-footer"><a class="dropdown-item info text-right pr-1" href="javascript:void(0)">Read all</a></li>
                  </div>
                </ul>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <div class="arrow_box_right">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6>
                    </li>
                    <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left"><span class="avatar avatar-sm rounded-circle"><img src="{{ asset('assets/admin/app-assets/images/portrait/small/avatar-s-6.png') }}" alt="avatar"></span></div>
                          <div class="media-body">
                            <h6 class="media-heading text-bold-700">Sarah Montery<i class="ft-circle font-small-2 success float-right"></i></h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Everything looks good. I will provide...</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">3:55 PM</time></small>
                          </div>
                        </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left"><span class="avatar avatar-sm rounded-circle"><span class="media-object rounded-circle text-circle bg-warning">E</span></span></div>
                          <div class="media-body">
                            <h6 class="media-heading text-bold-700">Eliza Elliot<i class="ft-circle font-small-2 danger float-right"></i></h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Okay. here is some more details...</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">2:10 AM</time></small>
                          </div>
                        </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left"><span class="avatar avatar-sm rounded-circle"><img src="{{ asset('assets/admin/app-assets/images/portrait/small/avatar-s-3.png') }}" alt="avatar"></span></div>
                          <div class="media-body">
                            <h6 class="media-heading text-bold-700">Kelly Reyes<i class="ft-circle font-small-2 warning float-right"></i></h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Check once and let me know if you...</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Yesterday</time></small>
                          </div>
                        </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left"><span class="avatar avatar-sm rounded-circle"><img src="{{ asset('assets/admin/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="avatar"></span></div>
                          <div class="media-body">
                            <h6 class="media-heading text-bold-700">Tonny Deep<i class="ft-circle font-small-2 danger float-right"></i></h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">We will start new project development...</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time></small>
                          </div>
                        </div></a></li>
                    <li class="dropdown-menu-footer"><a class="dropdown-item text-right info pr-1" href="javascript:void(0)">Read all</a></li>
                  </div>
                </ul>
              </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="{{ asset('assets/admin/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="avatar"></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="{{ asset('assets/admin/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="avatar"><span class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="project-summary.html"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="login.html"><i class="ft-power"></i> Logout</a>
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
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{ asset('assets/admin/app-assets/images/logo/logo.png') }}"/>
              <h3 class="brand-text">Chameleon</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="navigation-background"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="index-2.html"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="dashboard-ecommerce.html">eCommerce</a>
              </li>
              <li class="active"><a class="menu-item" href="dashboard-analytics.html">Analytics</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Apps</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="email-application.html">Email Application</a>
              </li>
              <li><a class="menu-item" href="chat-application.html">Chat Application</a>
              </li>
              <li><a class="menu-item" href="full-calender.html">Full Calendar</a>
              </li>
              <li><a class="menu-item" href="project-summary.html">Project Summary</a>
              </li>
              <li><a class="menu-item" href="invoice-template.html">Invoice</a>
              </li>
              <li><a class="menu-item" href="#">Timelines</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="timeline-center.html">Timelines Center</a>
                  </li>
                  <li><a class="menu-item" href="timeline-horizontal.html">Timelines Horizontal</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="user-profile.html">Users Profile</a>
              </li>
              <li><a class="menu-item" href="users-contacts.html">Contact List</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Templates</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#">Vertical</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="index.html">Classic Menu</a>
                  </li>
                  <li><a class="menu-item" href="../vertical-modern-menu-template/index.html">Modern Menu</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#">Horizontal</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="../horizontal-menu-template-nav/index.html">Full Width</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Layouts</span><span class="badge badge badge-pill badge-danger float-right mr-2">5</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#">Content Sidebar</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="layout-content-detached-left-sidebar.html">Left sidebar</a>
                  </li>
                  <li><a class="menu-item" href="layout-content-detached-left-sticky-sidebar.html">Sticky left sidebar</a>
                  </li>
                  <li><a class="menu-item" href="layout-content-detached-right-sidebar.html">Right sidebar</a>
                  </li>
                  <li><a class="menu-item" href="layout-content-detached-right-sticky-sidebar.html">Sticky right sidebar</a>
                  </li>
                </ul>
              </li>
              <li class="navigation-divider"></li>
              <li><a class="menu-item" href="navbar-hide-on-scroll-top.html">Hide on Scroll Top</a>
              </li>
              <li><a class="menu-item" href="vertical-nav-compact-menu.html">Compact navigation</a>
              </li>
              <li><a class="menu-item" href="layout-fixed-navbar.html">Fixed navbar</a>
              </li>
              <li><a class="menu-item" href="layout-fixed-navigation.html">Fixed navigation</a>
              </li>
              <li><a class="menu-item" href="layout-fixed-navbar-navigation.html">Fixed navbar &amp; navigation</a>
              </li>
              <li><a class="menu-item" href="layout-fixed-navbar-footer.html">Fixed navbar &amp; footer</a>
              </li>
              <li class="navigation-divider"></li>
              <li><a class="menu-item" href="layout-fixed.html">Fixed layout</a>
              </li>
              <li><a class="menu-item" href="layout-boxed.html">Boxed layout</a>
              </li>
              <li><a class="menu-item" href="layout-static.html">Static layout</a>
              </li>
              <li class="navigation-divider"></li>
              <li><a class="menu-item" href="layout-light.html">Navigation light</a>
              </li>
              <li><a class="menu-item" href="layout-dark.html">Navigation Dark</a>
              </li>
              <li><a class="menu-item" href="vertical-nav-flipped.html">Flipped Navigation</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-zap"></i><span class="menu-title" data-i18n="">Starter kit</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#">Content sidebar</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#">Left sidebar</a>
                  </li>
                  <li><a class="menu-item" href="#">Sticky left sidebar</a>
                  </li>
                  <li><a class="menu-item" href="#">Right sidebar</a>
                  </li>
                  <li><a class="menu-item" href="#">Sticky right sidebar</a>
                  </li>
                </ul>
              </li>
              <li class="navigation-divider"></li>
              <li><a class="menu-item" href="#">Fixed navbar</a>
              </li>
              <li><a class="menu-item" href="#">Fixed navigation</a>
              </li>
              <li><a class="menu-item" href="#">Fixed navbar &amp; navigation</a>
              </li>
              <li><a class="menu-item" href="#">Fixed navbar &amp; footer</a>
              </li>
              <li class="navigation-divider"></li>
              <li><a class="menu-item" href="#">Fixed layout</a>
              </li>
              <li><a class="menu-item" href="#">Boxed layout</a>
              </li>
              <li><a class="menu-item" href="#">Static layout</a>
              </li>
              <li class="navigation-divider"></li>
              <li><a class="menu-item" href="#">Navigation Light</a>
              </li>
              <li><a class="menu-item" href="#">Navigation Dark</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-aperture"></i><span class="menu-title" data-i18n="">User Interface</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#">Content</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="content-grid.html">Grid</a>
                  </li>
                  <li><a class="menu-item" href="content-typography.html">Typography</a>
                  </li>
                  <li><a class="menu-item" href="content-text-utilities.html">Text utilities</a>
                  </li>
                  <li><a class="menu-item" href="content-syntax-highlighter.html">Syntax highlighter</a>
                  </li>
                  <li><a class="menu-item" href="content-helper-classes.html">Helper classes</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#">Color Palette</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="color-palette-primary.html">Primary palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-danger.html">Danger palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-success.html">Success palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-warning.html">Warning palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-info.html">Info palette</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="color-palette-red.html">Red palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-pink.html">Pink palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-purple.html">Purple palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-blue.html">Blue palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-cyan.html">Cyan palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-teal.html">Teal palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-yellow.html">Yellow palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-amber.html">Amber palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-blue-grey.html">Blue Grey palette</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="card-bootstrap.html">Bootstrap Cards</a>
              </li>
              <li><a class="menu-item" href="card-advanced.html">Advanced Cards</a>
              </li>
              <li><a class="menu-item" href="#">Icons</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="icons-feather.html">Feather</a>
                  </li>
                  <li><a class="menu-item" href="icons-line-awesome.html">Line Awesome</a>
                  </li>
                  <li><a class="menu-item" href="icons-simple-line-icons.html">Simple Line Icons</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="animation.html">Animation</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-box"></i><span class="menu-title" data-i18n="">Components</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#">Bootstrap</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="component-alerts.html">Alerts</a>
                  </li>
                  <li><a class="menu-item" href="component-buttons.html">Buttons</a>
                  </li>
                  <li><a class="menu-item" href="component-carousel.html">Carousel</a>
                  </li>
                  <li><a class="menu-item" href="component-collapse.html">Collapse</a>
                  </li>
                  <li><a class="menu-item" href="component-dropdowns.html">Dropdowns</a>
                  </li>
                  <li><a class="menu-item" href="component-list-group.html">List Group</a>
                  </li>
                  <li><a class="menu-item" href="component-modals.html">Modals</a>
                  </li>
                  <li><a class="menu-item" href="component-pagination.html">Pagination</a>
                  </li>
                  <li><a class="menu-item" href="component-navs-component.html">Navs</a>
                  </li>
                  <li><a class="menu-item" href="component-tabs-component.html">Tabs</a>
                  </li>
                  <li><a class="menu-item" href="component-pills-component.html">Pills</a>
                  </li>
                  <li><a class="menu-item" href="component-tooltips.html">Tooltips</a>
                  </li>
                  <li><a class="menu-item" href="component-popovers.html">Popovers</a>
                  </li>
                  <li><a class="menu-item" href="component-badges.html">Badges</a>
                  </li>
                  <li><a class="menu-item" href="component-pill-badges.html">Pill Badges</a>
                  </li>
                  <li><a class="menu-item" href="component-progress.html">Progress</a>
                  </li>
                  <li><a class="menu-item" href="component-media-objects.html">Media Objects</a>
                  </li>
                  <li><a class="menu-item" href="component-spinner.html">Spinner</a>
                  </li>
                  <li><a class="menu-item" href="component-toast.html">Toast</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#">Extra</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="ex-component-sweet-alerts.html">Sweet Alerts</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-toastr.html">Toastr</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-ratings.html">Ratings</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-tour.html">Tour</a>
                  </li>
                  <li><a class="menu-item" href="#">Editors</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="editor-ckeditor.html">CKEditor</a>
                      </li>
                      <li><a class="menu-item" href="editor-tinymce.html">TinyMCE</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="pickers-date-%26-time-picker.html">Date &amp; Time Picker</a>
                  </li>
                  <li><a class="menu-item" href="block-ui.html">Block UI</a>
                  </li>
                  <li><a class="menu-item" href="file-uploader-dropzone.html">File Uploader</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-edit"></i><span class="menu-title" data-i18n="">Forms</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#">Form Elements</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="form-inputs.html">Form Inputs</a>
                  </li>
                  <li><a class="menu-item" href="form-switch.html">Switch</a>
                  </li>
                  <li><a class="menu-item" href="form-select2.html">Select2</a>
                  </li>
                  <li><a class="menu-item" href="form-checkboxes-radios.html">Checkboxes &amp; Radios</a>
                  </li>
                  <li><a class="menu-item" href="form-tags-input.html">Tags Input</a>
                  </li>
                  <li><a class="menu-item" href="form-validation.html">Validation</a>
                  </li>
                  <li><a class="menu-item" href="form-extended-inputs.html">Extended Inputs</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#">Form Layouts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="form-layout-basic.html">Basic Forms</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-horizontal.html">Horizontal Forms</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-hidden-labels.html">Hidden Labels</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="form-wizard.html">Form Wizard</a>
              </li>
              <li><a class="menu-item" href="form-repeater.html">Form Repeater</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-grid"></i><span class="menu-title" data-i18n="">Tables</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="table-bootstrap.html">Bootstrap Tables</a>
              </li>
              <li><a class="menu-item" href="#">DataTables</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="dt-basic-initialization.html">Basic Initialisation</a>
                  </li>
                  <li><a class="menu-item" href="dt-styling.html">Styling</a>
                  </li>
                  <li><a class="menu-item" href="dt-data-sources.html">Data Sources</a>
                  </li>
                  <li><a class="menu-item" href="dt-advanced-initialization.html">Advanced initialisation</a>
                  </li>
                  <li><a class="menu-item" href="dt-api.html">API</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="">Charts</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="chartist-charts.html">Chartist</a>
              </li>
              <li><a class="menu-item" href="chartjs-charts.html">Chartjs</a>
              </li>
              <li><a class="menu-item" href="#">Maps</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="google-maps.html">Google Maps</a>
                  </li>
                  <li><a class="menu-item" href="jvector-maps.html">jVector Map</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-sidebar"></i><span class="menu-title" data-i18n="">Pages</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="gallery-grid.html">Gallery</a>
              </li>
              <li><a class="menu-item" href="search.html">Search</a>
              </li>
              <li><a class="menu-item" href="#">Authentication</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="login.html">Login</a>
                  </li>
                  <li><a class="menu-item" href="register.html">Register</a>
                  </li>
                  <li><a class="menu-item" href="unlock-user.html">Unlock User</a>
                  </li>
                  <li><a class="menu-item" href="recover-password.html">Recover password</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#">Error</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="error-400.html">Error 400</a>
                  </li>
                  <li><a class="menu-item" href="error-401.html">Error 401</a>
                  </li>
                  <li><a class="menu-item" href="error-403.html">Error 403</a>
                  </li>
                  <li><a class="menu-item" href="error-404.html">Error 404</a>
                  </li>
                  <li><a class="menu-item" href="error-500.html">Error 500</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="coming-soon.html">Coming Soon</a>
              </li>
              <li><a class="menu-item" href="under-maintenance.html">Maintenance</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="changelog.html"><i class="ft-file"></i><span class="menu-title" data-i18n="">Changelog</span><span class="badge badge badge-pill badge-warning float-right">1.2</span></a>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-server"></i><span class="menu-title" data-i18n="">Menu levels</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#">Second level</a>
              </li>
              <li><a class="menu-item" href="#">Second level child</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#">Third level</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#">Raise Support</span></a>
          </li>
          <li class=" nav-item"><a href="#">Documentation</span></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-primary box-shadow-3" href="#" id="customizer-toggle-setting"><i class="ft-settings font-medium-3 spinner white"></i></a><div class="customizer-content p-2">
	<h5 class="mt-1 mb-1 text-bold-500">Navbar Color Options</h5>
	<div class="navbar-color-options clearfix">
		<div class="gradient-colors mb-1 clearfix">
			<div class="bg-gradient-x-purple-blue navbar-color-option" data-bg="bg-gradient-x-purple-blue" title="bg-gradient-x-purple-blue"></div>
			<div class="bg-gradient-x-purple-red navbar-color-option" data-bg="bg-gradient-x-purple-red" title="bg-gradient-x-purple-red"></div>
			<div class="bg-gradient-x-blue-green navbar-color-option" data-bg="bg-gradient-x-blue-green" title="bg-gradient-x-blue-green"></div>
			<div class="bg-gradient-x-orange-yellow navbar-color-option" data-bg="bg-gradient-x-orange-yellow" title="bg-gradient-x-orange-yellow"></div>
			<div class="bg-gradient-x-blue-cyan navbar-color-option" data-bg="bg-gradient-x-blue-cyan" title="bg-gradient-x-blue-cyan"></div>
			<div class="bg-gradient-x-red-pink navbar-color-option" data-bg="bg-gradient-x-red-pink" title="bg-gradient-x-red-pink"></div>
		</div>
		<div class="solid-colors clearfix">
			<div class="bg-primary navbar-color-option" data-bg="bg-primary" title="primary"></div>
			<div class="bg-success navbar-color-option" data-bg="bg-success" title="success"></div>
			<div class="bg-info navbar-color-option" data-bg="bg-info" title="info"></div>
			<div class="bg-warning navbar-color-option" data-bg="bg-warning" title="warning"></div>
			<div class="bg-danger navbar-color-option" data-bg="bg-danger" title="danger"></div>
			<div class="bg-blue navbar-color-option" data-bg="bg-blue" title="blue"></div>
		</div>
	</div>

	<hr>

	<h5 class="my-1 text-bold-500">Layout Options</h5>
	<div class="row">
		<div class="col-12">
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="default-layout" checked>
				<label class="custom-control-label" for="default-layout">Default</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="fixed-layout">
				<label class="custom-control-label" for="fixed-layout">Fixed</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="static-layout">
				<label class="custom-control-label" for="static-layout">Static</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="boxed-layout">
				<label class="custom-control-label" for="boxed-layout">Boxed</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="d-inline-block custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons" id="right-side-icons">
				<label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
			</div>
		</div>
	</div>

	<hr>

	<h5 class="mt-1 mb-1 text-bold-500">Sidebar menu Background</h5>
	<!-- <div class="sidebar-color-options clearfix">
		<div class="bg-black sidebar-color-option" data-sidebar="menu-dark" title="black"></div>
		<div class="bg-white sidebar-color-option" data-sidebar="menu-light" title="white"></div>
	</div> -->
	<div class="row sidebar-color-options ml-0">
		<label for="sidebar-color-option" class="card-title font-medium-2 mr-2">White Mode</label>
		<div class="text-center mb-1">
			<input type="checkbox" id="sidebar-color-option" class="switchery" data-size="xs"/>
		</div>
		<label for="sidebar-color-option" class="card-title font-medium-2 ml-2">Dark Mode</label>
	</div>

	<hr>

	<label for="collapsed-sidebar" class="font-medium-2">Menu Collapse</label>
	<div class="float-right">
		<input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs"/>
	</div>

	<hr>

	<!--Sidebar Background Image Starts-->
	<h5 class="mt-1 mb-1 text-bold-500">Sidebar Background Image</h5>
	<div class="cz-bg-image row">
		<div class="col mb-3">
			<img src="{{ asset('assets/admin/app-assets/images/backgrounds/04.jpg') }}" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="{{ asset('assets/admin/app-assets/images/backgrounds/01.jpg') }}" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="{{ asset('assets/admin/app-assets/images/backgrounds/02.jpg') }}" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="{{ asset('assets/admin/app-assets/images/backgrounds/05.jpg') }}" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
	</div>
	<!--Sidebar Background Image Ends-->

	<!--Sidebar BG Image Toggle Starts-->
	<div class="sidebar-image-visibility">
		<div class="row ml-0">
			<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">Hide Image</label>
			<div class="text-center mb-1">
				<input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs" checked/>
			</div>
			<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">Show Image</label>
		</div>
	</div>
	<!--Sidebar BG Image Toggle Ends-->

	<hr>

	<div class="row mb-2">
		<!-- <div class="col">
			<a href="#">Buy Now</a>
		</div> -->
		<div class="col">
			<a href="#">More Themes</a>
		</div>
	</div>
	<div class="text-center">
		<button id="twitter" class="btn btn-social-icon btn-twitter sharrre mr-1"><i class="la la-twitter"></i></button>
		<button id="facebook" class="btn btn-social-icon btn-facebook sharrre mr-1"><i class="la la-facebook"></i></button>
		<button id="google" class="btn btn-social-icon btn-google sharrre"><i class="la la-google"></i></button>
	</div>
</div>
    </div>
    <!-- End: Customizer-->


    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2019  &copy; Copyright <a class="text-bold-800 grey darken-2" href="#">Workoo</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
          <li class="list-inline-item"><a class="my-1" href="#"> More themes</a></li>
          <li class="list-inline-item"><a class="my-1" href="#"> Support</a></li>
        </ul>
      </div>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/scripts/forms/switch.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS--
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/app-assets/js/core/app-menu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/core/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/js/scripts/customizer.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/jquery.sharrre.js') }}" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS--
    <script src="{{ asset('assets/admin/app-assets/js/scripts/pages/dashboard-analytics.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->
    @include('partials.notify')
    @yield('footer_scripts')
  </body>
  <!-- END: Body-->

</html>
