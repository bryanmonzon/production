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

Route::redirect('home', 'dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('projects', 'Projects\ProjectsController@index')->name('projects.index');
    Route::get('projects/all', 'Projects\ProjectsController@all')->name('projects.all');
    Route::post('projects', 'Projects\ProjectsController@store')->name('projects.store');
    Route::patch('projects/{project}', 'Projects\ProjectsController@update')->name('projects.update');
    Route::get('projects/create', 'Projects\ProjectsController@create')->name('projects.create');
    Route::get('projects/{project}', 'Projects\ProjectsController@edit')->name('projects.edit');
    Route::delete('projects/{project}', 'Projects\ProjectsController@delete')->name('projects.delete');

    Route::get('plans', 'Plans\PlansController@index')->name('plans.index');
    Route::get('plans/create', 'Plans\PlansController@create')->name('plans.create');
    Route::delete('plans/{plan}', 'Plans\PlansController@delete')->name('plans.delete');
    Route::get('plans/{plan}', 'Plans\PlansController@edit')->name('plans.edit');
    Route::post('plans', 'Plans\PlansController@store')->name('plans.store');
    // Route::patch('plans/{plan}', 'Plans\PlansController@update')->name('projects.update');

    Route::get('plans/{plan}/projects', 'PlanProjects\PlanProjectController@index')->name('plan.projects.index');
    Route::get('plans/{plan}/projects/{project}', 'PlanProjects\PlanProjectController@show')->name('plan.projects.show');

    Route::patch('plans/{plan}/projects/add-projects', 'PlanProjects\AddProjectsPlanController@sync');

    Route::get('plans/{plan}/projects/{project}/users', 'UsersProjects\UsersProjectController@index')->name('plan.projects.users');
    Route::post('plans/{plan}/projects/{project}/users/add-users', 'UsersProjects\UsersProjectController@store')->name('plan.projects.users.store');
    Route::get('users/all', 'Users\UsersController@all')->name('users.all');
});