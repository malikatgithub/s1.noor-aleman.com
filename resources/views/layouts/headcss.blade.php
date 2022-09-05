<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidnav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awsome.css') }}" rel="stylesheet">




    <style>
            @font-face
             {
                font-family: font;
                src: url("{{asset('fonts/Cairo-Regular.ttf')}}");
            }
    </style>



    <!-- calling some java script files -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap-jquery.js')}}"></script>
    <script src="{{asset('js/proper.js')}}"></script>
    <script src="{{asset('js/font-awsome.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
   
    {{-- Ajax search  --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    

</head>
<body style='direction:rtl; font-family: "font"'>
  
    <main class="">
            @yield('content')
        </main>
    </div>

</body>
</html>
    