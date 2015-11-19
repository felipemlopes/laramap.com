@extends('layouts.default')

@section('page_title')
    Artisan Offers
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h4>Special Offers for Artisans</h4>
        </div>

        {{--<p>As a developer you often use third party services. Laramap is provides special offers for all artisans in the community.</p>--}}

        {{--<br>--}}

        <div class="row">
            @foreach($offers as $offer)
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ $offer->image }}" alt="{{ $offer->title }}">
                            <div class="caption">
                                <h5>{{ $offer->title }}</h5>
                                <p>{!!str_limit($offer->description, 100)  !!}</p>
                                <a href="{{ route('account.offers.show', $offer->slug) }}" class="btn btn-sm btn-primary">Learn more</a>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        <br>


        {!! $offers->render() !!}
    </div>
@stop