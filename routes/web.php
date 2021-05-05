<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PageController;

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

Route::get('/contact', 'App\Http\Controllers\PageController@contact');
Route::get('/about', 'App\Http\Controllers\PageController@about');

Route::get('/memo', 'App\Http\Controllers\PageController@memo');

Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');
Route::get('/articles/{id}', 'App\Http\Controllers\ArticlesController@show');


// test page
Route::get('/hello', 'App\Http\Controllers\HelloController@index');
