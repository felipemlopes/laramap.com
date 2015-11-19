<!DOCTYPE html>
<html lang="en" ng-app="laramapNG">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Florian Wartner">
    <meta name="description" content="Laramap - List of artisans.">
    <meta name="keywords" content="laravel, php, framework, web, artisans, laramap, artisanmap, florian wartner, fwartner">
    <meta name="fl-verify" content="8f9ac2b08e92e27d54f795249ceb6f38">

    <link rel="icon" href="https://laramap.com/img/Logo_1000x1000.png">

    <title>@yield('page_title') | Backend - Laramap.com</title>

    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    @yield('styles')

    @include('parsedownextra::emojis-stylesheet')
    @include('parsedownextra::highlightjs-stylesheet')

    {{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>