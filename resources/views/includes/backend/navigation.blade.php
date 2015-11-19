<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('backend') }}">
                <img alt="Laramap" style="max-height: 25px;" src="{{ asset('images/logo-dark.png') }}">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('backend') }}">Dashboard</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('backend.users.index') }}">Manage Users</a></li>
                        <li><a href="{{ route('backend.users.create') }}">Create User</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Content <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('backend.articles.index') }}">Manage Articles</a></li>
                        <li><a href="{{ route('backend.articles.create') }}">Create Article</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('backend.tutorials.index') }}">Manage Tutorials</a></li>
                        <li><a href="{{ route('backend.tutorials.create') }}">Create Tutorial</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('backend.meetups.index') }}">Manage Meetups</a></li>
                        <li><a href="{{ route('backend.meetups.create') }}">Create Meetup</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('backend.projects.index') }}">Manage Projects</a></li>
                        <li><a href="{{ route('backend.projects.create') }}">Create Project</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('backend.reports.index') }}">Manage Reports</a></li>
                        <li><a href="{{ route('backend.reports.create') }}">Create Report</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Offers <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('backend.offers.index') }}">Manage Offers</a></li>
                        <li><a href="{{ route('backend.offers.create') }}">Create Offers</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('backend.products.index') }}">Manage Products</a></li>
                        <li><a href="{{ route('backend.products.create') }}">Create Product</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('backend.orders.index') }}">Manage Orders</a></li>
                        <li><a href="{{ route('backend.orders.create') }}">Create Order</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('backend.bugreports.index') }}">Bugreports</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Site <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('backend.callouts.index') }}">Manage Callouts</a></li>
                        <li><a href="{{ route('backend.callouts.create') }}">Create Callout</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>

            </ul>

            @if($signedIn)
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            @if($currentUser->avatar)
                                <img src="{{ $currentUser->avatar }}" alt="{{ $currentUser->username }}" class="img img-circle" style="max-width: 20px; max-height: 20px;">
                                @else
                                <img src="{{ Gravatar::src($currentUser->email) }}" alt="{{ $currentUser->username }}" class="img img-circle" style="max-width: 20px; max-height: 20px;">
                            @endif
                            {{ $currentUser->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if($currentUser->is_admin == true)
                                <li><a href="{{ url('/') }}"><i class="fa fa-star"></i> Site</a></li>
                                <li role="separator" class="divider"></li>
                            @endif
                            <li><a href="{{ url('@'.$currentUser->username) }}"><i class="fa fa-user"></i> Show Profile</a></li>
                            <li><a href="{{ url('account/profile') }}"><i class="fa fa-pencil"></i> Edit Profile</a></li>
                            <li><a href="{{ url('account/settings') }}"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @endif

        </div>
    </div>
</nav>