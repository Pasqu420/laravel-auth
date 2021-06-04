<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/', 'GuestController@welcome')
    ->name('welcome');

Route::get('/show/{id}', 'HomeController@show')
    ->name('show');

Route::get('edit/{id}','HomeController@edit')
    ->name('edit');
Route::post('update/{id}','HomeController@update')
    ->name('update');