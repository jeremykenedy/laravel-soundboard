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
    | Inital Users to be seeded
    |--------------------------------------------------------------------------
    */
    'baseSuperAdminUser01Name'  => env('INITIAL_SEEDED_SUPER_ADMIN_USERNAME', 'Super Admin'),
    'baseSuperAdminUser01Email' => env('INITIAL_SEEDED_SUPER_ADMIN_USEREMAIL', 'superadmin@superadmin.com'),
    'baseSuperAdminUser01PW'    => env('INITIAL_SEEDED_SUPER_ADMIN_USERPASSWORD', 'password'),

    'baseAdminUser01Enabled'    => env('INITIAL_SEEDED_ADMIN_ENABLED', false),
    'baseAdminUser01Name'       => env('INITIAL_SEEDED_ADMIN_USERNAME', 'Admin'),
    'baseAdminUser01Email'      => env('INITIAL_SEEDED_ADMIN_USEREMAIL', 'admin@admin.com'),
    'baseAdminUser01PW'         => env('INITIAL_SEEDED_ADMIN_USERPASSWORD', 'password'),

    'baseUser01Enabled'         => env('INITIAL_SEEDED_USER_ENABLED', false),
    'baseUser01Name'            => env('INITIAL_SEEDED_USER_USERNAME', 'User'),
    'baseUser01Email'           => env('INITIAL_SEEDED_USER_USEREMAIL', 'user@user.com'),
    'baseUser01PW'              => env('INITIAL_SEEDED_USER_USERPASSWORD', 'password'),

];
