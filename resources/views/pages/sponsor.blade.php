@extends('layouts.default')

@section('page_title')
    Sponsoring
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Sponsoring</h1>
        </div>

        <div class="row">
            <div class="col-sm-4 col-md-4">

                <div class="plan first">

                    <div class="head">
                        <h2>Artisan</h2>

                    </div>

                    <ul class="item-list">
                        <li>Get a <strong>sponsor</strong> badge in your profile</li>
                        <li>Support the maintainer and keep the site alive</li>
                        <li>Get featured on Twitter</li>
                        <li>Feel <i class="fa fa-heart"></i> by the community</li>
                    </ul>

                    <div class="price">
                        <h3><span class="symbol">$</span>15</h3>
                        <h4>per year</h4>
                    </div>

                    @if($signedIn)
                        <form action="{{ route('sponsor.store') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="plan" value="lmsponsor15">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{!! env('STRIPE_KEY') !!}"
                                    data-amount="1500"
                                    data-name="Laramap.com"
                                    data-description="Laramap Artisan ($15.00)"
                                    data-image="{!! asset('images/1000x1000.png') !!}"
                                    data-locale="auto">
                            </script>
                        </form>
                    @endif

                </div>


            </div>


            <div class="col-sm-4 col-md-4 ">

                <div class="plan recommended">

                    <div class="head">
                        <h2>Fan</h2>
                    </div>

                    <ul class="item-list">
                        <li>Get a <strong>sponsor</strong> badge in your profile</li>
                        <li>Support the maintainer and keep the site alive</li>
                        <li>Get featured on Twitter</li>
                        <li>Get an exclusive Laramap T-shirt</li>
                        <li>Be the first who can test new features</li>
                        <li>Feel <i class="fa fa-heart"></i> by the community</li>
                    </ul>

                    <div class="price">
                        <h3><span class="symbol">$</span>25</h3>
                        <h4>per year</h4>
                    </div>

                   @if($signedIn)
                        <form action="{{ route('sponsor.store') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="plan" value="lmsponsor25">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{!! env('STRIPE_KEY') !!}"
                                    data-amount="2500"
                                    data-name="Laramap.com"
                                    data-description="Laramap Fan ($25.00)"
                                    data-image="{!! asset('images/1000x1000.png') !!}"
                                    data-locale="auto">
                            </script>
                        </form>
                    @endif

                </div>

            </div>


            <div class="col-sm-4 col-md-4  ">
                <div class="plan last">

                    <div class="head">
                        <h2>Lover</h2>

                    </div>

                    <ul class="item-list">
                        <li>Get a <strong>sponsor</strong> badge in your profile</li>
                        <li>Support the maintainer and keep the site alive</li>
                        <li>Get featured on Twitter</li>
                        <li>Be the first who can test new features</li>
                        <li>Get an exclusive Laramap T-shirt</li>
                        <li>Get an exlusive present</li>
                        <li>Feel <i class="fa fa-heart"></i> by the community</li>
                    </ul>

                    <div class="price">
                        <h3><span class="symbol">$</span>50</h3>
                        <h4>per year</h4>
                    </div>

                    @if($signedIn)
                        <form action="{{ route('sponsor.store') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="plan" value="lmsponsor50">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{!! env('STRIPE_KEY') !!}"
                                    data-amount="5000"
                                    data-name="Laramap.com"
                                    data-description="Laramap Lover ($50.00)"
                                    data-image="{!! asset('images/1000x1000.png') !!}"
                                    data-locale="auto">
                            </script>
                        </form>
                    @endif

                </div>

            </div>

        </div>

        <hr/>
        <h5>Thanks to {{ $users->count() }} lovely sponsors</h5>
        <div class="row">
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
        </div>
    </div>
@stop