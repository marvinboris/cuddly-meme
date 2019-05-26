<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="Workoo, Job,CV, Africa,embauche">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Workoo">
        <meta property="og:url" content="https://workoo.net/">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Workoo">
        <meta property="og:description" content="La plateforme d'embauche du nouveau monde">
        <title> Workoo - @yield("title","La plateforme d'embauche du nouveau monde") </title>


        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/line-icons.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" >
        @yield("stylesheet")

    </head>
    <body>
        <main>

            @section("content")

            @show

            @include("partials.footer")


            <script src="{{ asset('js/jquery-min.js') }}" ></script>
            <script src="{{ asset('js/popper.min.js') }}" ></script>
            <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
            <!-- <script src="{{ asset('js/color-switcher.js') }}" ></script> -->
            <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
            <script src="{{ asset('js/jquery.slicknav.js') }}" ></script>
            <script src="{{ asset('js/jquery.counterup.min.js') }}" ></script>
            <script src="{{ asset('js/waypoints.min.js') }}" ></script>
            <script src="{{ asset('js/form-validator.min.js') }}" ></script>
            <script src="{{ asset('js/contact-form-script.js') }}" ></script>
            <script src="{{ asset('js/main.js') }}" ></script>
            <script>
                $(document).ready(function(){
                    // au clic sur un lien
                    $('a').on('click', function(evt){
                        var target = $(this).attr('href');
                        if(target[0] == '#' && target.length > 1){
                            evt.preventDefault();
                            $('html, body')
                                .stop()
                                .animate({scrollTop: $(target).offset().top}, 1000 );
                        }
                    });
                });
            </script>

            @yield("scripts")

        </main>
    </body>
</html>
