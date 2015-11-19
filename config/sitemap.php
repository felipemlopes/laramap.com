<?php

/* Simple configuration file for Laravel Sitemap package */
return [
    'use_cache'      => true,
    'cache_key'      => 'sitemap.' . config('app.url'),
    'cache_duration' => 3600,
    'escaping'       => true,
];