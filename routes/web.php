<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ArticlesController;
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

// Route::get('/', function () {
//     return view('welcome');
// }) ->name('home');


Route::get('/contact', 'App\Http\Controllers\PageController@contact')->name('contact');
Route::get('/about', 'App\Http\Controllers\PageController@about')->name('about');
Route::get('/memo', 'App\Http\Controllers\PageController@memo')->name('memo');


// Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('articles.index');
// // 記事作成
// Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create')->name('articles.create');
// Route::get('/articles/{id}', 'App\Http\Controllers\ArticlesController@show')->name('articles.show');
// // 保存　
// Route::post('/articles', 'App\Http\Controllers\ArticlesController@store')->name('articles.store');
// Route::get('articles/{id}/edit', 'App\Http\Controllers\ArticlesController@edit')->name('articles.edit');
// Route::patch('articles/{id}', 'App\Http\Controllers\ArticlesController@update')->name('articles.update');
// Route::delete('articles/{id}', 'App\Http\Controllers\ArticlesController@destroy')->name('articles.destroy');

Route::get('/', 'App\Http\Controllers\ArticlesController@index')->name('home'); // home画面
Route::resource('articles', 'App\Http\Controllers\ArticlesController');

// test page
Route::get('/hello', 'App\Http\Controllers\HelloController@index')->name('hello');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
