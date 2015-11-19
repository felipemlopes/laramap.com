var elixir = require('laravel-elixir');

elixir.config.js.browserify.transformers.push({
    name: 'vueify',
    options: {}
});

elixir(function(mix) {
    mix.sass('app.scss')
        // Vendor
        .scripts([
            'vendor/bootstrap.js',
            'vendor/moment.js',
            'vendor/sweetalert-dev.js',
            'vendor/vue.js',
            'vendor/angular.js',
            'vendor/jcs-auto-validate.js',
            'vendor/vue.js',
            //'vendor/typeahead.jquery.js',
            //'vendor/typeahead.bundle.js',
            //'vendor/typeahead-addresspicker',
            'vendor/angular-google-maps_dev_mapped.js',
            'vendor/bootstrap-notify.js',
            'vendor/autocomplete.js',
            //'vendor/highlight.js',
            'vendor/html2canvas.js'
        ], 'public/js/vendor.js')
        .styles([
            'vendor/paper.css',
            'vendor/font-awesome.css',
            'vendor/sweetalert.css',
            'vendor/autocomplete.css',
            'vendor/bootstrap-social.css'
        ], 'public/css/vendor.css')


        // Extra
        .scripts([
            'extra/events.js',
            'extra/search.js',
            'extra/functions.js',
            'extra/bug.js'
        ], 'public/js/app.js')

        .version(['js/vendor.js', 'css/vendor.css', 'js/app.js', 'css/app.css']);

});
