<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/users/login', 'Auth\LoginController@login')
    ->name('user.login');
Route::post('/users', 'Auth\RegisterController@register')
    ->name('user.register');
    

   
Route::middleware('auth:api')->group(function () {
    Route::get('/token/validate', 'UserController@getAuthenticatedUser')
        ->name('passport.token.validate');


Route::get('search', [

   
        'uses' =>'CarController@search',
        'as' =>'search'

    ]);
    Route::get('cars','CarController@get');
    Route::get('/user', 'UserController@getAuthenticatedUser')
        ->name('user.authenticated');

    Route::get('/users/logout', 'Auth\LoginController@logout')
        ->name('user.logout');
});


