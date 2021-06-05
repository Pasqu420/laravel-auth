<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'GuestController@welcome')
    ->name('welcome');

Route::get('/show/{id}', 'HomeController@show')
    ->name('show');

Route::get('edit/car/{id}','HomeController@edit')
    ->name('edit');
Route::post('update/car/{id}','HomeController@update')
    ->name('update');

Route::get('delete/car/{id}','HomeController@delete')
    ->name('delete');
Route::get('delete/pilot/{id}','HomeController@deletePilot')
    ->name('delete-pilot');