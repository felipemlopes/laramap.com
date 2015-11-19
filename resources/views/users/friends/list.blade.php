@extends('layouts.default')

@section('page_title')
    {{ $user->username }}´s Friends
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{ $user->username }}´s <small>Friends</small></h1>
        </div>

        @if($user->friends->count() > 0)
            @foreach($friends as $friend)
                <div class="media">
                    <div class="media-left">
                        <a href="{{ url('@'.$friend->user->username) }}">
                            <img class="media-object" src="{{ $friend->user->avatar }}" alt="{{ $friend->user->username }}">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $friend->user->username }}</h4>
                    </div>
                </div>
            @endforeach
            @else
            <p>{{ $user->username }} has currently no friends =/</p>
        @endif
    </div>
@stop