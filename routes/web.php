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
Route::group(['middleware' => 'auth'], function(){
  Route::get('/', 'HomeController@index');
  Route::get('/posts/{id}', [
    'uses' => 'PostController@show',
    'as' => 'post_show_path'
  ]);
});

Route::get('auth', [
  'uses' => 'AuthController@index',
  'as' => 'auth_show_path'
]);
Route::post('auth/login', [
  'uses' => 'AuthController@store',
  'as' => 'auth_store_path'
]);
Route::get('auth/logout', [
  'uses' => 'AuthController@destroy',
  'as' => 'auth_destroy_path'
]);

Auth::routes();
