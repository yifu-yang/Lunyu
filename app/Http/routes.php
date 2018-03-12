<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



// auth route
Route::get('/', 'AccountController@index');
Route::get('callback','AccountController@callback' );


// home page route
Route::get('home/timeline','HomeController@timeLine' );
Route::get('home/user','HomeController@userInfo' );
Route::get('home/topic','HomeController@topic' );
Route::get('home/send','HomeController@sendLun' );
Route::get('home/people','HomeController@interestingPeople' );

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|   
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
//     Route::get('/callback','AccountController@callback' );
// });
