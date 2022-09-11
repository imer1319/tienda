<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" href="/admin/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/admin/css/argon.css?v=1.2.0" type="text/css">
  @yield('styles')
</head>

<body>

  @include('layouts.admin.sidebar')

  <div class="main-content" id="panel">

    @include('layouts.admin.navbar')

    <div class="container-fluid mt--6">

      @yield('content')
      
      @include('layouts.admin.footer')
    </div>
  </div>
  <script src="/admin/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/vendor/js-cookie/js.cookie.js"></script>
  <script src="/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="/admin/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/admin/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/admin/js/argon.js?v=1.2.0"></script>
  @yield('scripts')
</body>

</html>
