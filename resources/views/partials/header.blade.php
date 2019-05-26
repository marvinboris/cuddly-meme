<header id="home" class="hero-area">
    @auth
        @include("partials.navLoggedIn")
    @endauth 

    @noauth 
        @include("partials.nav")
    @endnotauth

</header>