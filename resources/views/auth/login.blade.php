<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Aviato | E-commerce template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">
    <meta name="user" content="{{ Auth::user() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="/web/plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/web/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="/web/plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="/web/plugins/slick/slick.css">
    <link rel="stylesheet" href="/web/plugins/slick/slick-theme.css">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="web/css/style.css">

</head>

<body id="body">
    <section class="signin-page account" id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <h2 class="text-center">Iniciar sesión</h2>
                        <form method="POST" class="text-left clearfix" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" placeholder="Username" required
                                    autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Contraseña" required autocomplete="current-password">

                                @error('password')
                                    <span class="d-block text-sm text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">INICIAR SESIÓN</button>
                            </div>
                        </form>
                        <p class="mt-20">¿ Es nuevo en el sitio ?<a href="{{ route('register') }}"> Crear nueva
                                cuenta</a></p>
                        <p class="mt-20">Volver al <a href="/">inicio </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="/web/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="/web/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="/web/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="/web/plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="/web/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="/web/plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="/web/plugins/slick/slick.min.js"></script>
    <script src="/web/plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script type="text/javascript" src="/web/plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="web/js/script.js"></script>



</body>

</html>
