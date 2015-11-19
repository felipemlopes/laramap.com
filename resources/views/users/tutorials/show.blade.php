@extends('layouts.default')

@section('page_title')
    {{ $article->title }} by {{ $article->user->username }}
@stop

@section('styles')

@stop

@section('scripts')
    @include('includes.partials.signin_modal')
@stop

@section('content')
    <div class="container"ng-controller="RegisterController">
        <div class="page-header">
            <h3>{{ $article->title }} <small>Created {{ $article->created_at->diffForHumans() }}</small></h3>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="media-body">
                    {!! Markdown::parse($article->content) !!}
                </div>


                <div class="col-md-12">
                    @if($signedIn)
                        @if($article->liked($currentUser))
                            <a href="{{ url('@'.$article->user->username.'/article/'.$article->slug.'/dislike') }}" class="btn btn-sm btn-default" type="button">
                                <i class="fa fa-thumbs-down"></i>
                            </a>
                        @else
                            <a href="{{ url('@'.$article->user->username.'/article/'.$article->slug.'/like') }}" class="btn btn-sm btn-default" type="button">
                                <i class="fa fa-thumbs-up"></i>
                            </a>
                        @endif
                    @endif

                    {{--@foreach($likers as $like)--}}
                    {{--{{ dd($like) }}--}}
                    {{--<div class="col-md-1">--}}
                    {{--<br>--}}
                    {{--<a href="{{ url('@') . $like->user->username }}">--}}
                    {{--@if($like->user->avatar && $like->user->email)--}}
                    {{--<img style="max-height: 40px; max-width: 40px;" src="{{ $like->user->avatar }}" alt="{{ $like->user->username }}" class="img-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">--}}
                    {{--@else--}}
                    {{--<img style="max-height: 40px; max-width: 40px;" src="{{ Gravatar::src($like->user->email) }}" alt="{{ $like->user->username }}" class="img-circle">--}}
                    {{--@endif--}}
                    {{--</a>--}}
                    {{--<br>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                </div>

                <hr/>

                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES * * */
                    var disqus_shortname = 'laramapcom';

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
            </div>

            <div class="col-md-3">
                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <a href="{{ url('@'.$user->username) }}" class="avatar">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->username }}">
                        @else
                            <img src="{{ Gravatar::src($user->email) }}" alt="{{ $user->username }}">
                        @endif
                    </a>
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
            </div>
        </div>
    </div>
@stop