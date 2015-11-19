<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Florian Wartner">
    <meta name="description" content="Laramap - List of artisans.">
    <meta name="keywords" content="laravel, php, framework, web, artisans, laramap, artisanmap, florian wartner, fwartner">
    <meta name="fl-verify" content="8f9ac2b08e92e27d54f795249ceb6f38">

    <link rel="icon" href="https://laramap.com/img/Logo_1000x1000.png">

    <title>Whoops! =/ - 404</title>

    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
    </style>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <br>
                <a href="{{ url('/') }}"><img class="center-block" src="{{ asset('images/logo-dark.png') }}" alt="Laramap"></a>
                <h1 class="text-center">Whoops! {404}</h1>
                <p class="text-center"><strong>The page you´re looking for is not available.</strong></p>
            </div>
        </div>
    </div>

</body>
</html>