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

Route::get('/projects', 'ProjectsController@index');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/create', 'ProjectsController@create');


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
