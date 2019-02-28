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

// Taskページを表示
Route::get('/tasks','TaskController@getAll');

// タスク追加
Route::post('/task/add','TaskController@add');

// タスク削除
Route::get('/task/delete','TaskController@delete');

// タスク変更画面へ
Route::get('/task/edit','TaskController@edit');

// タスク更新
Route::get('/task/update','EditController@update');

// Calendarページ、タスク期限更新
Route::get('/calendar','CalendarController@showCalendar');