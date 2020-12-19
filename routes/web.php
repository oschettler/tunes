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

Route::get('/', 'ProjectController@home')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('data', 'DataController')
        ->except('show', 'update');

        Route::resource('project', 'ProjectController')
        ->except('show', 'home');

    Route::get('project/{project}/images', 'ProjectController@images')
        ->name('project.images');

    Route::post('media/{media}/delete', 'MediaController@delete');
});

Route::put('/data/{data}', 'DataController@update')->name('data.update');
Route::get('/data/{data}', 'DataController@show')->name('data.show');
Route::get('/{project}', 'ProjectController@show')->name('project.show');
