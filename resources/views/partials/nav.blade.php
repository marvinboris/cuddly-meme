<style>
  .theme-header .nav-link{
    color:white !important;
  }
</style>  
<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar" style="height: 70px;">
  <div class="container h-100">
    <div class="theme-header clearfix h-100">
      <div class="navbar-header h-100">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="lni-menu"></span>
        <span class="lni-menu"></span>
        <span class="lni-menu"></span>
        </button>
        <a href="/" class="navbar-brand h-100 p-0"><img src="{{ asset('img/wall/workoo-big.png') }}" class="h-100" alt="logo"></a>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" class="h-100">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item {{ !Request::segment(1) ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/') }}" >
              Home
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'how-it-works' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('how-it-works') }}" >
              How it works 
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'search' ? 'active' : null }}">
            <a class="nav-link dropdown-toggle" href="{{ route('search-worker') }}" >
              Search
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'contact' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('contact') }}">
              Contact
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'login' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('login') }}">Sign In</a>
          </li>
          <li class="button-group">
            <a href="{{ route('register') }}" class="button btn btn-common">Register</a>
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
    <ul class="navbar-nav mr-auto justify-content-end">
      <li class="nav-item {{ !Request::segment(1) ? 'active' : null }}">
        <a class="nav-link" href="{{ url('/') }}" >
          Home
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) === 'how-it-works' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('how-it-works') }}" >
          How it works 
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) === 'search' ? 'active' : null }}">
        <a class="nav-link dropdown-toggle" href="{{ route('search-worker') }}" >
          Search
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) === 'contact' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('contact') }}">
          Contact
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) === 'login' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('login') }}">Sign In</a>
      </li>
      <li class="button-group">
        <a href="{{ route('register') }}" class="button btn btn-common">Register</a>
      </li>
    </ul>
  </div>
  <div class="position-absolute h-100" style="width: calc(100% - 280px); left: 280px; top: 0px;" data-toggle="collapse" data-target="#mobile-navbar"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></div>
</div>

@include("partials.herocontainer")
