<style>
  .nav-link{
    color:white !important;
  }
</style> 

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar" style="height: 70px;">
  <div class="container">
    <div class="theme-header clearfix">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="lni-menu"></span>
        <span class="lni-menu"></span>
        <span class="lni-menu"></span>
        </button>
        <a href="/" class="navbar-brand p-0" style="height: 70px;"><img src="{{ asset('img/wall/workoo-big.png') }}" class="h-100" alt="logo"></a>
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
  </div>
  <div class="mobile-menu" data-logo="{{ asset('img/workoo.png') }}"></div>
</nav>

@include("partials.herocontainer")
