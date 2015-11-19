@extends('layouts.default')

@section('page_title')
    {{ $friend->username }}
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="page-header">
                {{--<h3>{{ $friend->username }} <small>{{ $friend->name }}</small></h3>--}}
                @if($signedIn && $friend->id == $currentUser->id)
                    <ol class="breadcrumb">
                        <li><a href="#">New Article</a></li>
                        <li><a href="#">New Tutorial</a></li>
                        <li><a href="#">New Project</a></li>
                        <li><a href="#">New Meetup</a></li>
                    </ol>
                @endif
            </div>


            <div class="col-md-3">
                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        @if($friend->avatar)
                            <img src="{{ $friend->avatar }}" alt="{{ $friend->username }}">
                        @else
                            <img src="{{ Gravatar::src($friend->email) }}" alt="{{ $friend->username }}">
                        @endif
                    </div>
                    <div class="info">
                        <div class="title">
                            <p>{{ $friend->username }}</p>
                        </div>

                        @if($friend->is_admin == true)
                            <div class="desc"><i class="fa fa-star"></i> Administrator</div>
                            @else
                            <div class="desc"><i class="fa fa-user"></i> Artisan</div>
                        @endif
                    </div>
                    <div class="bottom">

                    </div>
                </div>

                <div class="tabbable-panel">
                    <p><strong>About</strong> @if($signedIn && $friend->id == $currentUser->id) <a href="{{ url('account/profile') }}">Edit</a> @endif</p>
                    <p><i class="fa fa-calendar-o"></i> Member since {{ $friend->created_at->formatLocalized('%d %B %Y') }}</p>
                    @if($friend->hireable == true)
                        <p><i class="fa fa-briefcase"></i> Available for hire</p>
                    @endif
                        <p><i class="fa fa-map-o"></i> From {{ $friend->location }}</p>

                    <p><strong>Social</strong></p>
                    @if($friend->github_profile)
                        <p><i class="fa fa-github"></i> {{ $friend->name }} on <a target="_self" href="{{ $friend->github_profile }}">GitHub</a></p>
                    @endif
                    @if($friend->twitter_profile)
                        <p><i class="fa fa-twitter"></i> {{ $friend->name }} on <a target="_self" href="{{ $friend->twitter_profile }}">Twitter</a></p>
                    @endif
                </div>
            </div>

            <div class="col-md-9">
                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                            <li><a href="#activities" data-toggle="tab">Activity</a></li>
                            <li><a href="#contributions" data-toggle="tab">Contributions</a></li>
                            <li><a href="#friends" data-toggle="tab">Friends</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <h4>Location</h4>
                                <img class="img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?center={!! $friend->location !!}&zoom=13&size=980x250&maptype=roadmap&markers=color:red%7C{!! $friend->latitude !!},{!! $friend->longitude !!}" alt="">

                                <h4>Biography</h4>
                                {!! Markdown::parse($friend->bio) !!}

{{--                                <pre>{{ dd($friend->getAllFriendships()) }}</pre>--}}
                            </div>

                            <div class="tab-pane" id="activities">
                                <h4>Activity</h4>

                                @if($friend->activity->count() > 0)
                                        @include('users.activity.list')
                                    @else
                                    <strong>{{ $friend->username }} has no recent activity</strong>
                                @endif
                            </div>

                            <div class="tab-pane" id="contributions">
                                <h4>Contributions</h4>

                                @if(!$friend->contributions = null)
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    @if($friend->articles->count() > 0)
                                        <div class="panel panel-default">

                                            <div class="panel-heading" role="tab" id="headingArticles">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#articles" aria-expanded="false" aria-controls="articles">
                                                        {{ $friend->articles->count() }} articles
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="articles" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingArticles">
                                                <div class="panel-body">
                                                    <ul>
                                                        @foreach($friend->articles as $article)
                                                            <li><a href="{{ url('@'.$friend->username.'/article/'.$article->slug) }}">{{ $article->title }}</a> - {{ $article->created_at->diffForHumans() }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($friend->tutorials->count() > 0)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTutorial">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#tutorials" aria-expanded="false" aria-controls="tutorials">
                                                        Tutorials
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="tutorials" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTutorial">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($friend->projects->count() > 0)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingProjects">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#projects" aria-expanded="false" aria-controls="projects">
                                                        Projects
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="projects" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingProjects">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($friend->meetups->count() > 0)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingMeetups">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#meetups" aria-expanded="false" aria-controls="meetups">
                                                        Meetups
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="meetups" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMeetups">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                    @else
                                    <strong>{{ $friend->username }} has no recent contributions</strong>
                                @endif
{{--                                <pre>{!! json_encode($friend->articles) !!}</pre>--}}
                            </div>

                            <div class="tab-pane" id="friends">
                                <h4>Friends</h4>

                                @if($friend->friends->count() > 0)
                                    @foreach($friend->friends as $friend)
                                        <div class="col-md-1">
                                            <br>
                                            <a href="{{ url('@') . $friend->username }}">
                                                @if($friend->avatar && $friend->email)
                                                    <img style="max-height: 40px; max-width: 40px;" src="{{ $friend->avatar }}" alt="{{ $friend->username }}" class="img-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
                                                @else
                                                    <img style="max-height: 40px; max-width: 40px;" src="{{ Gravatar::src($friend->email) }}" alt="{{ $friend->username }}" class="img-circle">
                                                @endif
                                            </a>
                                            <br>
                                        </div>
                                    @endforeach
                                    @else
                                    <strong>{{ $friend->username }} has no friends</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop