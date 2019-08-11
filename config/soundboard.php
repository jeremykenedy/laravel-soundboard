<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Front End Application Name.
    |--------------------------------------------------------------------------
    */
    'name' => env('SOUNDBOARD_APP_NAME', config('app.name')),

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML attribute `subtitle`.
    |--------------------------------------------------------------------------
    */
    'description' => env('SOUNDBOARD_DEFAULT_DESCRIPTION', 'SoundBoard is an open source soundboard built on Laravel and VueJS'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML attribute `author`.
    |--------------------------------------------------------------------------
    */
    'author' => env('SOUNDBOARD_DEFAULT_AUTHOR', 'Jeremy Kenedy'),

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */
    'services' => [
        'googleAnalyticsID' => env('SOUNDBOARD_GOOGLEANALYTICSID', null),
    ],

    /*
    |--------------------------------------------------------------------------
    | Inital Super User to be seeded
    |--------------------------------------------------------------------------
    */

    'baseSuperAdminUser01Name'     => env('INITIAL_SEEDED_SUPER_ADMIN_USERNAME', 'admin'),
    'baseSuperAdminUser01Email'    => env('INITIAL_SEEDED_SUPER_ADMIN_USEREMAIL', 'admin@admin.com'),
    'baseSuperAdminUser01PW'       => env('INITIAL_SEEDED_SUPER_ADMIN_USERPASSWORD', 'password'),

];
