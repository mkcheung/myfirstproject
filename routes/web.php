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

use Illuminate\Filesystem\Filesystem;

// app()->bind('example', function (){
// 	return new \App\Example;
// });


app()->singleton('example', function (){
	return new \App\Example;
});

app()->singleton('App\Services\Twitter', function (){
	return new \App\Services\Twitter('adaafdsaasd');
});

Route::get('/', 'PagesController@home');
// Route::get('/', function(){
// 	//demonstrate service container utiliztion
// 	// app(Filesystem::class);
// 	// dd(app('example'), app('example'));
// 	return view('welcome');
// });
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');


//following convention....
Route::resource('projects', 'ProjectsController');

//.....vs manual implementation
// Route::get('/projects', 'ProjectsController@index');
// Route::get('/projects/create', 'ProjectsController@create');
// Route::get('/projects/{project}', 'ProjectsController@show');
// Route::get('/projects/{project}/edit', 'ProjectsController@edit');
// Route::patch('/projects/{project}', 'ProjectsController@update');
// Route::delete('/projects/{project}', 'ProjectsController@destroy');
// Route::post('/projects/', 'ProjectsController@store');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');