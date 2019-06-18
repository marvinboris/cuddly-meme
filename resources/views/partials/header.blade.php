<header id="home" class="hero-area">

    @if(Sentinel::check())
        @include("partials.navLoggedIn")
    @else
        @include("partials.nav")
    @endif

</header>
