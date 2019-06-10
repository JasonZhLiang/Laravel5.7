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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

/*  some Restful conventions about define the route: behaviours interact with a model

    GET /projects (index)
    GET /projects/create (create)
    GET /projects/1 (show)
    POST /projects (store)
    GET /projects/1/edit (edit)
    PUT  //put is similar with patch, ignore for now
    PATCH /projects/1  (update) //normally most of time, you will only update 1 certain project with id 1, instead of update all of them.
    DELETE /projects/1  (destroy) //same as update, delete only 1 for most of time.
*/

Route::resource('projects', 'ProjectsController'); //because we follow the convention, this line will give us the same result as below 7 lines

//Route::get('/projects', 'ProjectsController@index');
//
//Route::get('/projects/create', 'ProjectsController@create');
//
////{project} is a wild card Laravel routing identifier
//Route::get('/projects/{project}', 'ProjectsController@show');
//
//Route::post('/projects', 'ProjectsController@store');
//
//Route::get('/projects/{project}/edit', 'ProjectsController@edit');
//
//Route::patch('/projects/{project}', 'ProjectsController@update');
//
//Route::delete('/projects/{project}', 'ProjectsController@destroy');




Route::get('/angular', function()
{
    return View::make('angular');//this will not use blade
});

Route::get('/angular/todo', function()
{
    return \App\Todo::all();
});

Route::post('/angular/todo', function()
{
    //when you pass reference input::all() laravel know how to look for request data.
    return \App\Todo::create(\Illuminate\Support\Facades\Input::all());
});
