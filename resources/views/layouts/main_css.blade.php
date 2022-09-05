<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/sidnav.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/font-awsome.css') }}" rel="stylesheet">
    
    
        {{-- Toggle On and Off JS --}}
       
        
    
        <style>
                @font-face
                 {
                    font-family: font;
                    src: url("{{asset('public/fonts/Cairo-Regular.ttf')}}");
                }
        </style>
    
    
    
        <!-- calling some java script files -->
        <script src="{{asset('public/js/bootstrap.js')}}"></script>
        <script src="{{asset('public/js/bootstrap-jquery.js')}}"></script>
        <script src="{{asset('public/js/proper.js')}}"></script>
        <script src="{{asset('public/js/font-awsome.js')}}"></script>
        <script src="{{asset('public/js/plugins.js')}}"></script>   
        {{-- Ajax search  --}}
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    </head>
    
    <body style='direction:rtl; font-family: "font"'>
        <div class="d-flex" id="wrapper">