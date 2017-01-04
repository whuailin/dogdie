<?php

return [
    'use_styles'      => config('app.debug') ? true : false,
    'cache_key'       => 'anomaly.extension.sitemap',
    'cache_duration'  => env('SITEMAP_CACHE', 3600),
    'use_cache'       => false,
    'use_limit_size'  => false,
    'escaping'        => true,
    'max_size'        => null,
    'styles_location' => null,
];
