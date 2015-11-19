@extends('layouts.default')

@section('page_title')
    Artisans
@stop

@section('styles')

@stop

@section('scripts')
    <script src="//cdn.jsdelivr.net/typeahead.js/0.10.5/typeahead.jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch.helper/2/algoliasearch.helper.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var algolia = algoliasearch('9JUTOYSC0P', '1a8a0bdc9bf17ec7fea1046d16055136');
            var index = algolia.initIndex('users');

            var helper = algoliasearchHelper(algolia, 'users', {
                hitsPerPage: 50
            });

            $('#user-search').typeahead({hint: true}, {
                source: index.ttAdapter({hitsPerPage: 5}),
                displayKey: 'username',
                templates: {
                    suggestion: function(hit) {
                        return '<a href="{!! url('@') !!}' + hit.username +
                                '" class="hit">' +
                                '<div class="name">' +
                                hit._highlightResult.name.value + ' ' +
                                '(' + hit._highlightResult.username.value + ')' + /*' @ ' + hit.location + */
                                '</div>' +
                                '</a>';
                    },
                    empty: [
                        '<div class="empty-message">',
                        'Unable to find any artisans that match the current query',
                        '</div>'
                    ].join('\n'),
                }

            });
        });
    </script>
@stop

@section('content')
    <div class="container" >
        <div class="row">
            <div class="page-header">
                <h3>{{ App\User::where('is_sitepoint', 'false')->count() }} artisans</h3>
            </div>

            <form action="{{ route('search.store') }}" method="post">
                {!! csrf_field() !!}
                <input class="form-control twitter-typeahead" type="text" name="query" placeholder="Search for users by name, location ..." id="user-search" spellcheck="false" />
                <span>powered by <a target="_blank" href="https://www.algolia.com/cc/laramap?hi=laravel?utm_source=laramap&utm_medium=link&utm_campaign=laramap_search"><img width="50" src="/images/Algolia_logo_bg-white.png"></a></span>
            </form>

            <hr/>

            @foreach($users as $user)
                <div class="col-md-1">
                    <br>
                    <a href="{{ url('@') . $user->username }}">
                        @if($user->avatar && $user->email)
                            <img style="max-height: 40px; max-width: 40px;" src="{{ $user->avatar }}" alt="{{ $user->username }}" class="img-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
                        @else
                            <img style="max-height: 40px; max-width: 40px;" src="{{ Gravatar::src($user->email) }}" alt="{{ $user->username }}" class="img-circle">
                        @endif
                    </a>
                    <br>
                </div>
            @endforeach

            <div class="col-md-6 col-md-offset-3">
                {!! $users->render() !!}
            </div>

        </div>
    </div>
@stop