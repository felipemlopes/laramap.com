<!DOCTYPE html>
<html lang="en" ng-app="laramapNG">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title') - Laramap.com</title>

    <meta name="author" content="Florian Wartner">
    {!! SEO::generate() !!}
    <meta name="fl-verify" content="8f9ac2b08e92e27d54f795249ceb6f38">
    <meta name="p:domain_verify" content="04a1aaf206676b589b00b845f21dcdac"/>

    <link rel="icon" href="https://laramap.com/img/Logo_1000x1000.png">

    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    @yield('styles')

    @include('vendor.parsedownextra.emojis-stylesheet')
    @include('vendor.parsedownextra.highlightjs-stylesheet')

    {{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
