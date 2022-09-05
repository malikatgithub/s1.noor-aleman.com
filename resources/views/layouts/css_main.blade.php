
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>School Management System</title>
  <!-- Favicon -->
  <link rel="icon" href={{ asset('public/assets/img/brand/favicon.png') }} type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href={{ asset('public/assets/vendor/nucleo/css/nucleo.css') }} type="text/css">
  <link rel="stylesheet" href={{ asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }} type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href={{ asset('public/assets/css/argon.css?v=1.2.0') }} type="text/css">
  <link rel="stylesheet" href={{ asset('public/assets/css/custom_dash.css') }} type="text/css">
  <script src="{{asset('public/js/ajax.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>




<style>
    @font-face
     {
        font-family: font;
        src: url("{{asset('public/fonts/Cairo-Regular.ttf')}}");
    }
</style>

</head>

<body class="text-right" style='direction:rtl; font-family: "font"'>

    @yield('body')


<!-- Argon Scripts -->
<!-- Core -->
<script src={{ asset('public/assets/vendor/jquery/dist/jquery.min.js') }}></script>
<script src={{ asset('public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}></script>
<script src={{ asset('public/assets/vendor/js-cookie/js.cookie.js') }}></script>
<script src={{ asset('public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}></script>
<script src={{ asset('public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}></script>
<!-- Optional JS -->
<script src={{ asset('public/assets/vendor/chart.js/dist/Chart.min.js') }}></script>
<script src={{ asset('public/assets/vendor/chart.js/dist/Chart.extension.js') }}></script>
<!-- Argon JS -->
<script src={{ asset('public/assets/js/argon.js?v=1.2.0') }}></script>
<script src="{{asset('public/js/plugins.js')}}"></script>   

</body>

</html>