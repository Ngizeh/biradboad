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

Route::get('/projects/create', 'ProjectController@create')->name('projects.create');

Route::middleware('auth')->group(function() {

	Route::get('/projects', 'ProjectController@index')->name('projects.index');

	Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show');

    Route::get('/projects/{project}/tasks', 'ProjectController@edit')->name('projects.edit');

    Route::patch('/projects/{project}', 'ProjectController@update')->name('projects.update');


    Route::post('/projects', 'ProjectController@store')->name('projects.store');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->name('tasks.store');

	Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update')->name('tasks.update');
});
