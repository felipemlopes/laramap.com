@extends('layouts.default')

@section('page_title')
    Shop
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h3>Shop</h3>
        </div>

        <div class="row">
            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $product->image }}" alt="{{ $product['type'] }}">
                        <div class="caption">
                            <h5>{{ $product['brand'] }}</h5>
                            {{--<p>{!!str_limit($offer->description, 100)  !!}</p>--}}
                            {{--<a href="{{ route('account.offers.show', $offer->slug) }}" class="btn btn-sm btn-primary">Learn more</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop