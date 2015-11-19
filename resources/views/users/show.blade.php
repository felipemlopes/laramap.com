@extends('layouts.default')

@section('page_title')
    {{ $user->username }}
@stop

@section('styles')

@stop

@section('scripts')
    @include('users.partials.report_modal')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="page-header">
                <h3>{{ $user->username }} <small>{{ $user->name }}</small></h3>
            </div>


            <div class="col-md-3">
                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->username }}">
                        @else
                            <img src="{{ Gravatar::src($user->email) }}" alt="{{ $user->username }}">
                        @endif
                    </div>s
                    <div class="info">
                        <div class="title">
                            <p>{{ $user->username }}</p>
                        </div>

                        @if($user->is_admin == true)
                            <div class="desc"><i class="fa fa-star"></i> Administrator</div>
                            @else
                            <div class="desc"><i class="fa fa-user"></i> Artisan</div>
                        @endif
                    </div>
                    <div class="bottom">

                    </div>
                </div>

                <div class="tabbable-panel">
                    <p><strong>About</strong> @if(Auth::check() && $user->id == Auth::user()->id) <a href="{{ url('account/profile') }}">Edit</a> @endif</p>
                    @if($user->is_sponsor == true)<p><i class="fa fa-heart"></i> Sponsor</p>@endif
                    <p><i class="fa fa-calendar-o"></i> Member since {{ $user->created_at->formatLocalized('%d %B %Y') }}</p>
                    @if($user->hireable == true)
                        <p><i class="fa fa-briefcase"></i> Available for hire</p>
                    @endif
                        <p><i class="fa fa-map-o"></i> From {{ $user->location }}</p>

                    <p><strong>Social</strong></p>
                    @if($user->github_profile)
                        <p><i class="fa fa-github"></i> {{ $user->name }} on <a target="_self" href="{{ $user->github_profile }}">GitHub</a></p>
                    @endif
                    @if($user->twitter_profile)
                        <p><i class="fa fa-twitter"></i> {{ $user->name }} on <a target="_self" href="{{ $user->twitter_profile }}">Twitter</a></p>
                    @endif

                    @if($signedIn)
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#reportModal">
                            <i class="fa fa-flag"></i> Report User
                        </button>
                    @endif
                </div>
            </div>

            <div class="col-md-7">
                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                            <li><a href="#activities" data-toggle="tab">Activity</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                @if($user->location)
                                    <h4>Location</h4>
                                    <img class="img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?center={!! $user->location !!}&zoom=13&size=980x250&maptype=roadmap&markers=color:red%7C{!! $user->latitude !!},{!! $user->longitude !!}" alt="{!! $user->location !!}">
                                @endif
                                    <h4>Biography</h4>
                                {!! Markdown::parse($user->bio) !!}

{{--                                <pre>{{ dd($user->getAllFriendships()) }}</pre>--}}
                            </div>

                            <div class="tab-pane" id="activities">
                                <h4>Activity</h4>

                                @if($user->activity->count() > 0)
                                        @include('users.activity.list')
                                    @else
                                    <strong>{{ $user->username }} has no recent activity</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ url('@'.$user->username.'/articles') }}">Articles</a></li>
                    {{--<li><a href="{{ url('@'.$user->username.'/projects') }}">Projects</a></li>--}}
                    {{--<li><a href="{{ url('@'.$user->username.'/meetups') }}">Meetups</a></li>--}}
                </ul>
            </div>

        </div>
    </div>
@stop