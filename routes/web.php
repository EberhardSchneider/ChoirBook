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

// logged in ____________________________

Route::group(['middleware' => ['auth']], function () {

    Route::get('/choirs/member', 'ChoirController@getMember');
    Route::get('/user/id', function() {
        return response()->json(['id' => Auth::id()]);
    });



    Route::get('/{vue_capture?}', 'HomeController@home')->where('vue_capture', '[\/\w\.-]*');


});

Route::get('/', function() {
    return redirect('/home');
});