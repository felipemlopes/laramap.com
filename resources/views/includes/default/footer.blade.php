<div class="container">
    <hr>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-6">
                    <div class="container">

                        <div class="col-lg-6 col-md-4">
                            <div class="col-md-10">
                                <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=laramapcom" id="_carbonads_js"></script>
                            </div>
                            <h4>Links:</h4>

                            <a href="{{ url('p/about') }}">About</a> | <a href="{{ url('contact') }}">Contact</a> | <a href="{{ url('imprint') }}">Imprint</a>
                        </div>

                        <div class="col-lg-6">
                            <h4>Supported by:</h4>
                            <a href="https://bugsnag.com"> <img src="{{ asset('images/bugsnag-logo.png') }}" alt="" class="col-lg-2 img-responsive"></a>
                            <a href="https://pusher.com"> <img src="{{ asset('images/pusher_logo_dark.png') }}" alt="" class="col-lg-2 img-responsive"></a>
                            <a href="https://www.algolia.com/?utm_source=laramap&utm_medium=link"><img src="{{ asset('images/Algolia_logo_bg-white.png') }}" alt="" class="col-lg-2 img-responsive"></a>
                            <a href="https://www.digitalocean.com"><img src="{{ asset('images/DO_Proudly_Hosted_Badge_Blue.png') }}" alt="" class="col-lg-3 img-responsive"></a>
                            <a href="https://codeship.com/?utm_source=badge&utm_medium=badge&utm_term=getcodeshippedbadge&utm_campaign=badge_deployed_black", target="_blank"><img src="{{ asset('images/codeship-badge-deployed-black.png') }}" class="col-lg-3 img-responsive"/></a>
                        </div>

                        <hr>
                        <p class="col-lg-12">Copyright © {{ date('Y') }} Laramap.com | Created with <i class="fa fa-heart"></i> &amp; <i class="fa fa-coffee"></i> by <a href="https://twitter.com/fwartner">Florian Wartner</a> | Sponsored by
                            <a href="https://twitter.com/PhillippOh">Phillipp Ohlandt</a></p>
                        <hr/>
                        </div>
                </div>
            </div>
        </div>
    </footer>
</div>

@if(env('APP_ENV') == 'production')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-63437005-1', 'auto');
        ga('send', 'pageview');
        $('#flash-overlay-modal').modal();
    </script>
@endif

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ asset('js/app_an.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>
<script src="https://js.pusher.com/2.2/pusher.min.js"></script>

<script>
    this.pusher = new Pusher("{!! env('PUSHER_KEY') !!}");

    var userActionChannel = pusher.subscribe('user');

    userActionChannel.bind( "App\\Events\\UserRegistered", function( data ) {

        swal({
            title: "Wahoo!",
            text: data.user.username + " just joined Laramap!",
            imageUrl: data.user.avatar
        });
    } );

    userActionChannel.bind( "App\\Events\\UserDeleted", function( data ) {

        removeUser( data.id );
        addUser( data.id, data.isCompleted );
    } );

    userActionChannel.bind( "App\\Events\\UserSuspended", function( data ) {

        removeUser( data.id );
    } );

    userActionChannel.bind( "App\\Events\\UserBanned", function( data ) {

        removeUser( data.id );
    } );
</script>

@yield('scripts')
@include('includes.partials.bug')

@include('parsedownextra::highlightjs-init-jquery')