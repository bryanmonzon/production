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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::post('projects', 'Projects\ProjectsController@store')->name('projects.store');
    Route::patch('projects/{project}', 'Projects\ProjectsController@update')->name('projects.update');

    Route::post('plans', 'Plans\PlansController@store')->name('plans.store');
    // Route::patch('plans/{plan}', 'Plans\PlansController@update')->name('projects.update');
});