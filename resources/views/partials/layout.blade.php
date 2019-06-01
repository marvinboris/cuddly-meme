<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="Workoo, Job,CV, Africa,hiring">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Workoo">
        <meta property="og:url" content="https://workoo.net/">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Workoo">
        <meta property="og:description" content="The hiring platform of the new world">
        <title> Workoo - @yield("title","The hiring platform of the new world") </title>


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

             @include('partials.header')

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
            @include('partials.notify')
            @yield("scripts")

        </main>
    </body>
</html>
