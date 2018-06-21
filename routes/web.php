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

    Route::post('projects/{project}/questions', 'Projects\ProjectQuestionsController@store')->name('projects.questions.store');
    Route::delete('projects/{project}/questions/{question}', 'Projects\ProjectQuestionsController@delete')->name('projects.questions.delete');
    Route::get('projects/{project}/questions', 'Projects\ProjectQuestionsController@index')->name('projects.questions.index');

    Route::post('projects/{project}/concerns', 'Projects\ProjectConcernsController@store')->name('projects.concerns.store');
    Route::delete('projects/{project}/concerns/{concern}', 'Projects\ProjectConcernsController@delete')->name('projects.concerns.delete');
    Route::get('projects/{project}/concerns', 'Projects\ProjectConcernsController@index')->name('projects.concerns.index');
    Route::patch('/concerns/{concern}', 'Concerns\ConcernsController@update')->name('concerns.update');
    Route::delete('/concerns/{concern}', 'Concerns\ConcernsController@delete')->name('concerns.delete');

    Route::get('plans', 'Plans\PlansController@index')->name('plans.index');
    Route::get('plans/create', 'Plans\PlansController@create')->name('plans.create');
    Route::delete('plans/{plan}', 'Plans\PlansController@delete')->name('plans.delete');
    Route::get('plans/{plan}', 'Plans\PlansController@edit')->name('plans.edit');
    Route::post('plans', 'Plans\PlansController@store')->name('plans.store');
    // Route::patch('plans/{plan}', 'Plans\PlansController@update')->name('projects.update');

    Route::get('plans/{plan}/projects', 'PlanProjects\PlanProjectController@index')->name('plan.projects.index');
    Route::get('plans/{plan}/projects/{project}', 'PlanProjects\PlanProjectController@show')->name('plan.projects.show');

    Route::post('plans/{plan}/projects/', 'PlanProjects\PlanProjectController@store');
    Route::delete('plans/{plan}/projects/{project}', 'PlanProjects\PlanProjectController@delete');

    Route::patch('questions/{question}', 'Questions\QuestionsController@update')->name('questions.update');
    Route::delete('questions/{question}', 'Questions\QuestionsController@delete')->name('questions.delete');

    Route::get('questions/{question}/comments', 'Questions\QuestionCommentsController@index')->name('questions.comments.index');
    Route::post('questions/{question}/comments', 'Questions\QuestionCommentsController@store')->name('questions.comments.store');
    Route::delete('questions/{question}/comments/{comment}', 'Questions\QuestionCommentsController@delete')->name('questions.comments.delete');
    
    Route::delete('comments/{comment}', 'Comments\CommentsController@delete')->name('comments.delete');
    Route::patch('comments/{comment}', 'Comments\CommentsController@update')->name('comments.update');

    Route::get('projects/{project}/users', 'UsersProjects\UsersProjectController@index')->name('projects.users');
    Route::post('projects/{project}/users/add-users', 'UsersProjects\UsersProjectController@store')->name('plan.projects.users.store');
    Route::delete('projects/{project}/users/{user}', 'UsersProjects\UsersProjectController@delete')->name('plan.projects.users.delete');
    
    Route::get('users/all', 'Users\UsersController@all')->name('users.all');

    Route::post('tasks', 'Tasks\TasksController@store')->name('tasks.store');
    Route::patch('tasks/{task}', 'Tasks\TasksController@update')->name('tasks.update');

    Route::get('my/projects/all', 'My\MyProjectsController@all')->name('my.projects.all');
    Route::get('my/projects', 'My\MyProjectsController@index')->name('my.projects.index');

    Route::get('my/tasks/all', 'My\MyTasksController@all')->name('my.tasks.all');
    Route::get('my/tasks', 'My\MyTasksController@index')->name('my.tasks.index');


});