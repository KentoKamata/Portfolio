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

// Indexページを表示
Route::get('/', 'IndexController@index');

// Todoページを表示
Route::get('/tasklist','TaskController@task');