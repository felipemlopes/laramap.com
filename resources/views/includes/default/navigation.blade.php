<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="Laramap" style="max-height: 25px;" src="{{ asset('images/logo-dark.png') }}">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('p/about') }}">About</a></li>
                <li><a href="{{ url('artisans') }}">Artisans</a></li>
                {{--<li><a href="{{ url('articles') }}">Articles</a></li>--}}
                <li><a href="{{ url('sponsor') }}">Sponsoring</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Planet <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Community</li>
                        <li><a href="http://laravel.com/">Laravel.com</a></li>
                        <li><a href="http://laravel.io/">Laravel.io</a></li>
                        <li><a href="https://laracasts.com/">Laracasts</a></li>
                        <li><a href="https://larajobs.com?partner=499">LaraJobs</a></li>
                        <li><a href="https://laravel-news.com/">Laravel News</a></li>
                        <li><a href="https://larachat.co/">Larachat</a></li>
                        <li><a href="https://www.larasites.com">Larasites</a></li>
                        <li class="dropdown-header">Services</li>
                        <li><a href="https://forge.laravel.com">Forge</a></li>
                        <li><a href="https://envoyer.io/">Envoyer</a></li>
                    </ul>
                </li>
            </ul>


                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->username }}" class="img img-circle" style="max-width: 20px; max-height: 20px;">
                                @else
                                <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="{{ Auth::user()->username }}" class="img img-circle" style="max-width: 20px; max-height: 20px;">
                            @endif
                            {{ Auth::user()->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->is_admin == true)
                                <li><a href="{{ url('backend') }}"><i class="fa fa-star"></i> Admin</a></li>
                                <li role="separator" class="divider"></li>
                            @endif
                            <li><a href="{{ url('@'.Auth::user()->username) }}"><i class="fa fa-user"></i> Show Profile</a></li>
                            <li><a href="{{ url('account/profile') }}"><i class="fa fa-pencil"></i> Edit Profile</a></li>
                            {{--<li><a href="{{ url('account/settings') }}"><i class="fa fa-cog"></i> Account Settings</a></li>--}}
                            <li><a href="{{ route('account.offers.index') }}"><i class="fa fa-gift"></i> Specials</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                        </ul>
                    </li>
                    @else
                        <li><a href="{{ url('auth/register') }}">Register</a></li>
                        <li><a href="{{ url('auth/login') }}">Login</a></li>
                    @endif
                </ul>

            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--@if(Auth::check())--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contributions <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="{{ route('articles.create') }}"><i class="fa fa-file-text-o"></i> New Article</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        </div>
    </div>
</nav>