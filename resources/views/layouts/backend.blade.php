@include('includes.backend.header')

<body ng-app="laramapNG">
@include('includes.backend.navigation')

@yield('content')

@include('includes.backend.footer')
@include('sweet::alert')
@include('includes.partials.errors')
@include('parsedownextra::highlightjs-script')
</body>
</html>
