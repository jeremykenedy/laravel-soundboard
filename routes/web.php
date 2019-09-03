<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public Routes
Route::group(['middleware' => ['web', 'activity']], function () {
    Route::get('/', 'FrontEndController@index')->name('home');

    // Login / Registration / Forgot PW routes
    Auth::routes();
});

// Super Admin Routes
Route::group(['middleware' => ['auth', 'permission:perms.super.admin', 'web', 'activity']], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
});

// Admin Routes
Route::group(['middleware' => ['auth', 'permission:perms.admin', 'web', 'activity']], function () {
    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'     => 'themes',
            'create'    => 'createtheme',
            'update'    => 'updatetheme',
            'store'     => 'storetheme',
            'edit'      => 'edittheme',
            'destroy'   => 'destroytheme',
            'show'      => 'showtheme',
        ],
    ]);
    Route::post('/update-theme', 'ThemesManagementController@updateDefaultTheme')->name('update-theme');
    Route::get('sounds/create-recording', 'SoundsController@createRecording')->name('createrecording');
    Route::resource(
        'sounds',
        'SoundsController', [
            'names' => [
                'index'     => 'sounds',
                'show'      => 'showsound',
                'edit'      => 'editsound',
                'update'    => 'updatesound',
                'create'    => 'createsound',
                'store'     => 'storesound',
            ],
        ]
    );
});

// Registered Users Routes
Route::group(['middleware' => ['auth', 'permission:perms.user', 'web', 'activity']], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
