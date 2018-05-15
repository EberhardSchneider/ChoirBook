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

Route::get('/', function() {
    return redirect('/home');
});

Auth::routes();

// Route::get('/login', 'Auth\LoginController@login');
// Route::get('/logout', 'Auth\LoginController@logout');

// Route::get('/choirs/member/{user}', 'ChoirController@getMember');
// Route::get('/user/id', function() {
//     return response()->json(['id' => Auth::id()]);
// });



// Route::get('/{vue_capture?}', function () {
//     return view('home');
//   })->where('vue_capture', '[\/\w\.-]*');


// logged in ____________________________

Route::group(['middleware' => ['auth']], function () {

    Route::get('/choirs/member/{user}', 'ChoirController@getMember');
    Route::get('/user/id', function() {
        return response()->json(['id' => Auth::id()]);
    });



    Route::get('/{vue_capture?}', function () {
        return view('home');
    })->where('vue_capture', '[\/\w\.-]*');


});