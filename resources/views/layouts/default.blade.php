@include('includes.default.header')

<body ng-app="laramapNG">
@include('includes.default.navigation')

@yield('content')

@include('includes.default.footer')
@include('sweet::alert')
@include('includes.partials.errors')
@include('vendor.parsedownextra.highlightjs-script')
</body>
</html>
