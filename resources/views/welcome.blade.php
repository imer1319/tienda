<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="user" content="{{ Auth::user() }}">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/web/images/favicon.png" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="/web/plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/web/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="/web/plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="/web/plugins/slick/slick.css">
    <link rel="stylesheet" href="/web/plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/web/css/style.css">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body id="body">
    <div id="app">
        <section class="menu">
            <nav-bar></nav-bar>
        </section>

        <router-view></router-view>

        <footer-web></footer-web>
    </div>


    <!-- Main jQuery -->
    <script src="/web/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="/web/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="/web/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Video Lightbox Plugin -->
    <script src="/web/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="/web/plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="/web/plugins/slick/slick.min.js"></script>
    <script src="/web/plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="/web/plugins/google-map/gmap.js"></script>

    <script src="/web/js/script.js"></script>
</body>
</html>
