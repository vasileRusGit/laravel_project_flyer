<?php



Route::get('/', function () {
    return view('pages.home');
});

Route::resource('flyesrs', 'FlyersController');

