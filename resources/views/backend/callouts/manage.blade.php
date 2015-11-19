@extends('layouts.backend')

@section('page_title')
    Manage Callouts
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Manage Callouts</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul>
                    @foreach($callouts as $callout)
                        <li><a href="{{ route('backend.callouts.edit', $callout->id) }}">{{ $callout->title }}</a> - {{ $callout->created_at->diffForHumans() }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop