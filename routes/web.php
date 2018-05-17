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

use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

// logged in ____________________________

Route::group(['middleware' => ['auth']], function () {

    Route::get('/choirs/member', 'ChoirController@getMember');
    Route::get('/user/id', function() {
        return response()->json(['id' => Auth::id()]);
    });

    Route::post('/choirs/edit/{choir}', 'ChoirController@edit');
    Route::post('/choirs/create', 'ChoirController@create');
    



    Route::get('/{vue_capture?}', 'HomeController@home')->where('vue_capture', '[\/\w\.-]*');


});

Route::get('/', function() {
    return redirect('/home');
});