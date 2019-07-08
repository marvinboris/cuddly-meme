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
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favs/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favs/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favs/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favs/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favs/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favs/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favs/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favs/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favs/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/favs/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favs/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favs/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favs/favicon-16x16.png') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
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
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" >

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery.imgareaselect-0.9.10/css/imgareaselect-default.css') }}" />
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
            {{-- <!-- <script src="{{ asset('js/color-switcher.js') }}" ></script> --> --}}
            <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
            <script src="{{ asset('js/jquery.slicknav.js') }}" ></script>
            <script src="{{ asset('js/jquery.counterup.min.js') }}" ></script>
            <script src="{{ asset('js/waypoints.min.js') }}" ></script>
            <script src="{{ asset('js/form-validator.min.js') }}" ></script>
            <script src="{{ asset('js/contact-form-script.js') }}" ></script>
            <script src="{{ asset('js/main.js') }}" ></script>
            <script type="text/javascript" src="{{ asset('assets/jquery.imgareaselect-0.9.10/scripts/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/jquery.imgareaselect-0.9.10/scripts/jquery.imgareaselect.pack.js') }}"></script>
            @include('partials.notify')
            @yield("scripts")

        </main>
    </body>
</html>
