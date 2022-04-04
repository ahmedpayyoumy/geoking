<?php

return [
    'server_timezone' => 'UTC',
    'localize_carbon' => true,
    'attributes' => [
        'user_language' => 'language_id',
        'user_timezone' => 'timezone',
        'language_slug' => 'slug',
    ],
    'language' => [
        'model' => 'App\Models\Language',
        'fetch_method' => 'list',
    ],
];
