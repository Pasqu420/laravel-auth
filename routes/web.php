<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'GuestController@welcome')
    ->name('welcome');
    
 // rotte protette 
// show card
Route::get('/show/{id}', 'HomeController@show')
    ->name('show');
// update car
Route::get('edit/car/{id}','HomeController@edit')
    ->name('edit');
Route::post('update/car/{id}','HomeController@update')
    ->name('update');
// softDelete
Route::get('delete/car/{id}','HomeController@deleteCar')
    ->name('delete');
Route::get('delete/pilot/{id}','HomeController@deletePilot')
    ->name('delete-pilot');