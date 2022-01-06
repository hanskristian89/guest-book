<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', ['as' => 'index.home', 'uses' => 'App\Http\Controllers\IndexController@init']);
Route::post('/store', ['as' => 'index.store', 'uses' => 'App\Http\Controllers\IndexController@store']);

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::get('/api/city/{id_province}', ['as' => 'api.city', 'uses' => 'App\Http\Controllers\ApiController@apiCity']);
Route::group(['middleware' => 'auth'], function () {
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
        Route::get('tables/add', ['as' => 'pages.add_tables', 'uses' => 'App\Http\Controllers\PageController@addTables']);
        Route::post('tables/add', ['as' => 'pages.add_tables', 'uses' => 'App\Http\Controllers\PageController@addGuest']);
        Route::get('tables/{id}', ['as' => 'pages.edit_tables', 'uses' => 'App\Http\Controllers\PageController@editGuest']);
        Route::put('tables/update/{id}', ['as' => 'pages.update_tables', 'uses' => 'App\Http\Controllers\PageController@updateGuest']);
        Route::get('/delete-guest/{id}', ['as' => 'pages.delete', 'uses' => 'App\Http\Controllers\PageController@delete']);
});

