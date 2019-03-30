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

Route::get('/', 'IndexController@index');

Route::prefix('books')->group(function () {
    Route::get('/', 'BooksController@index');

    Route::post('/', function () {
        
    });

    Route::put('/{id}', function($bookId){

    });

    Route::delete('/{id}', function($bookId){

    });
});

