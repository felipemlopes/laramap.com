<div class="container">
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-6">
                    <div class="container">

                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ asset('js/app_an.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script src="https://js.pusher.com/2.2/pusher.min.js"></script>
<script>
    this.pusher = new Pusher("{!! env('PUSHER_KEY') !!}");

    var userActionChannel = pusher.subscribe('user');

    userActionChannel.bind( "App\\Events\\UserRegistered", function( data ) {

        swal({
            title: "Wahoo!",
            text: data.user.name + " just joined Laramap!",
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


@include('parsedownextra::highlightjs-init-jquery')