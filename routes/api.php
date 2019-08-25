<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user()->with('roles')->find($request->user()->id);
// });

Route::group(['middleware' => ['activity']], function () {
    Route::get('sounds', 'Api\SoundsController@index');
    Route::put('sounds/updateAll', 'Api\SoundsController@updateAllSortOrder');
    Route::patch('sound/updateEnabled/{id}', 'Api\SoundsController@updateEnabled');
    Route::post('sound/delete/{id}', 'Api\SoundsController@destroy');
});
