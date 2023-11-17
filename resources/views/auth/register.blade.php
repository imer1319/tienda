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

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="web/css/style.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body id="body">
    <section class="signin-page account" id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center block">
                        <h2 class="text-center">Registrarse</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="Nombres" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex">
                                <div class="form-group">
                                    <input id="apellido_paterno" type="text"
                                        class="form-control @error('apellido_paterno') is-invalid @enderror"
                                        name="apellido_paterno" value="{{ old('apellido_paterno') }}"
                                        placeholder="Apellido paterno" autocomplete="apellido_paterno">

                                    @error('apellido_paterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="apellido_materno" type="text"
                                        class="form-control @error('apellido_materno') is-invalid @enderror"
                                        name="apellido_materno" value="{{ old('apellido_materno') }}"
                                        placeholder="Apellido materno" autocomplete="apellido_materno">

                                    @error('apellido_materno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="ci" type="text"
                                    class="form-control @error('ci') is-invalid @enderror" name="ci"
                                    value="{{ old('ci') }}" placeholder="Número de Cédula" autocomplete="ci">

                                @error('ci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" placeholder="Usuario" required
                                    autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Correo electrónico" required
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <select id="genero" name="genero"
                                    class="form-control @error('genero') is-invalid @enderror">
                                    <option value="MASCULINO" {{ old('genero') == 'MASCULINO' ? 'selected' : '' }}>
                                        Masculino</option>
                                    <option value="FEMENINO" {{ old('genero') == 'FEMENINO' ? 'selected' : '' }}>
                                        Femenino</option>
                                    <option value="OTROS" {{ old('genero') == 'OTROS' ? 'selected' : '' }}>Otros
                                    </option>
                                </select>

                                @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="fecha_nacimiento" type="date"
                                    class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                    name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                                    autocomplete="fecha_nacimiento">

                                @error('fecha_nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Contraseña" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" placeholder="Repita la contraseña" type="password"
                                    class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Registrarse</button>
                            </div>
                        </form>
                        <p class="mt-20">¿Ya tiene una cuenta? <a href="{{ route('login') }}"> Iniciar sesión</a>
                        </p>
                        <p class="mt-20">Volver al <a href="/">inicio </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="/web/plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="web/js/script.js"></script>

</body>

</html>
