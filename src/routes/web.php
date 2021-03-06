<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    # PROJECTS
    Route::get('/projects', 'ProjectsController@index')->name('projects');
    Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
    Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');
    Route::post('/projects', 'ProjectsController@store')->name('projects.store');
    Route::patch('/projects/{project}', 'ProjectsController@update')->name('projects.update');

    #PROJECT TASKS
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->name('project_tasks.store');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update')->name('project_tasks.update');

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();