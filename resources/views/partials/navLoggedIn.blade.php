<style>
  .nav-link{
    color:white !important;
  }
</style> 

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
  <div class="container">
    <div class="theme-header clearfix">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="lni-menu"></span>
        <span class="lni-menu"></span>
        <span class="lni-menu"></span>
        </button>
        <a href="/" class="navbar-brand"><img src="{{ asset('img/workoo.png') }}" alt="logo"></a>
      </div>
      <div class="collapse navbar-collapse" id="main-navbar">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item {{ !Request::segment(1) ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/') }}" >
              Home
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('dashboard') }}" >
              Dashboard
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'how-it-works' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('how-it-works') }}" >
              How it works
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'search' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('search-worker') }}" >
              Search
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'contact' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('contact') }}">
              Contact
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'logout' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
          <li class="button-group">
            <a href="{{ url( Sentinel::getUser()->link ) }}" class="button btn btn-common">My Page</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="d-flex d-lg-none justify-content-between align-items-center w-100 h-100">
      <a href="/" class="navbar-brand h-100 p-0"><img src="{{ asset('img/wall/workoo-big.png') }}" class="h-100" alt="logo"></a>

      <button class="btn bg-success px-3" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-controls="mobile-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-lg fa-navicon"></i>
      </button>
    </div>
  </div>
</nav>

<div class="position-fixed collapse d-lg-none py-3 shadow-sm w-100 h-100" id="mobile-navbar" style="background-image: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)); top: 0px; left: 0px; z-index: 10000;">
    <div class="position-absolute bg-white px-3 h-100" style="width: 280px; top: 0px; padding-top: 70px;">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item {{ !Request::segment(1) ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/') }}" >
              Home
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('dashboard') }}" >
              Dashboard
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'how-it-works' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('how-it-works') }}" >
              How it works
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'search' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('search-worker') }}" >
              Search
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'contact' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('contact') }}">
              Contact
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'logout' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
          <li class="button-group">
            <a href="{{ url( Sentinel::getUser()->link ) }}" class="button btn btn-common">My Page</a>
          </li>
        </ul>
    </div>
    <div class="position-absolute h-100" style="width: calc(100% - 280px); left: 280px; top: 0px;" data-toggle="collapse" data-target="#mobile-navbar"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></div>
  </div>

@include("partials.herocontainer")
