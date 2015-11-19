@extends('layouts.default')

@section('page_title')
    {{ $user->username }}´s Articles
@stop

@section('styles')

@stop

@section('scripts')
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'laramapcom';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
    </script>
@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Articles <small>by {{ $user->username }}</small></h1>
        </div>

       <div class="row">
           <div class="col-md-9">
               @foreach($articles as $article)
                   <div class="media">
                       <div class="media-body">
                           <h4 class="media-heading">{{ $article->title }}</h4>
                           {!! str_limit(Markdown::parse($article->content), 250, '..') !!}
                           <br><br>
                           <a href="{{ url('@'.$article->user->username.'/article/'.$article->slug) }}" class="btn btn-sm btn-primary">Read Article</a>
                       </div>
                   </div>
               @endforeach

                   <br>
               {!! $articles->render() !!}
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