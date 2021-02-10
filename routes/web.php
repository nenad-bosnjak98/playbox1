<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PagesController@index')->name('index');


Route::get('/movies', 'App\Http\Controllers\MoviesController@index')->name('movies');

Route::get('/movies/{movie}', 'App\Http\Controllers\MoviesController@show')->name('movies.show');



Route::get('/shows', 'App\Http\Controllers\SeriesController@index')->name('series');

Route::get('/shows/{tv}', 'App\Http\Controllers\SeriesController@show')->name('series.show');


Route::get('/actors', 'App\Http\Controllers\ActorsController@index')->name('actors');

Route::get('/actors/{actor}', 'App\Http\Controllers\ActorsController@show')->name('actors.show');

Route::get('/actors/page/{page?}', 'App\Http\Controllers\ActorsController@index');

Route::resource('posts', 'App\Http\Controllers\PostsController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
