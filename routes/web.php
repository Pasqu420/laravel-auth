<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/', 'GuestController@welcome')
    ->name('welcome');

Route::get('/home', 'HomeController@index')
    ->name('home');
    Route::get('/show/{id}', 'HomeController@show')
    ->name('show');