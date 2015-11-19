@extends('layouts.backend')

@section('page_title')
    Dashboard
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Users: {{ $users->count() }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(!$users->count() == 0)
                            Latest: <a href="{{ route('backend.users.show', $users->last()->id) }}">{{ $users->last()->created_at->diffForHumans() }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Articles: {{ $articles->count() }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(!$articles->count() == 0)
                            Latest: <a href="{{ route('backend.articles.show', $articles->last()->id) }}">{{ $articles->last()->created_at->diffForHumans() }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tutorials: {{ $tutorials->count() }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(!$tutorials->count() == 0)
                            Latest: <a href="{{ route('backend.tutorials.show', $tutorials->last()->id) }}">{{ $tutorials->last()->created_at->diffForHumans() }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Meetups: {{ $meetups->count() }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(!$meetups->count() == 0)
                            Latest: <a href="{{ route('backend.meetups.show', $meetups->last()->id) }}">{{ $meetups->last()->created_at->diffForHumans() }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Projects: {{ $projects->count() }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(!$projects->count() == 0)
                            Latest: <a href="{{ route('backend.projects.show', $projects->last()->id) }}">{{ $projects->last()->created_at->diffForHumans() }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bugreports: {{ $bugs->count() }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(!$bugs->count() == 0)
                            Latest: <a href="{{ route('backend.bugreports.show', $bugs->last()->id) }}">{{ $bugs->last()->created_at->diffForHumans() }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop