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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['veriry' => 'true']);

Route::get('/home', 'HomeController@index')->name('home');

#events

Route::get('/events','Event\EventController@index');

#users

Route::get('/@{account}/events','User\UserController@events')->name('account.events');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/events/create','Event\EventController@create')->name('account.events.create');
    Route::post('/events/create','Event\EventController@store')->name('account.events.store');
    Route::post('/events/{event}','Event\EventController@manage')->name('account.events.manage');
});

Route::group(['namespace' => 'Event'], function(){

    Route::get('/create','EventController@create')->name('event.create')->middleware(['auth']);
});

Route::group(['namespace' => 'Uploader', 'prefix' => '/upload'], function(){
    Route::post('/image','ImageUploadController@upload');
});




#oauth
Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/callback/{provider}', 'Auth\LoginController@handleProviderCallback');
