<?php



Route::get('/', function () {
    return view('pages.home');
});

Route::resource('flyers', 'FlyersController');
Route::get('flyers', 'FlyersController@showAll')->middleware(['auth' || 'guest']);
Route::get('{zip}/{street}', 'FlyersController@show');
Route::post('{zip}/{street}/photos', 'FlyersController@addPhoto');

Auth::routes();

Route::get('/home', 'HomeController@index');
