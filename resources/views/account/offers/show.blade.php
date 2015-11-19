@extends('layouts.default')

@section('page_title')
    {{ $offer->title }}
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h4>{{ $offer->title }}</h4>
        </div>

        <div class="row">
            <div class="col-md-9">
                <h5>Description</h5>
                {!! $offer->description !!}
                <br>
                <h5>Info</h5>
                {!! $offer->content !!}
            </div>

            <div class="col-md-3">
                <h5>Info</h5>
                <img src="{!! $offer->image !!}" class="img-responsive" alt="{{ $offer->slug }}">

                <br>
                <div class="list-group">
                    @if($offer->url)
                        <a href="{!! $offer->url !!}" target="_blank" class="list-group-item"><strong>{{ $offer->title }}</strong></a>
                    @endif
                    @if($offer->code)
                        <a href="#" class="list-group-item"><strong>{!! $offer->code !!}</strong></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop