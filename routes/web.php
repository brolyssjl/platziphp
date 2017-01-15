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

  Route::get('posts/create', [
    'uses' => 'PostController@create',
    'as' => 'post_create_path'
  ]);

  Route::post('posts/create', [
    'uses' => 'PostController@store',
    'as' => 'post_create_path'
  ]);

  Route::get('posts/{id}/edit', [
    'uses' => 'PostController@edit',
    'as' => 'post_edit_path'
  ])->where('id', '[0-9]+');

  Route::put('posts/{id}/edit', [
    'uses' => 'PostController@update',
    'as' => 'post_put_path'
  ])->where('id', '[0-9]+');

  Route::delete('posts/{id}/delete', [
    'uses' => 'PostController@destroy',
    'as' => 'post_delete_path'
  ])->where('id', '[0-9]+');

  Route::get('posts/{id}', [
    'uses' => 'PostController@show',
    'as' => 'post_show_path'
    ])->where('id', '[0-9]+');
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

/* CRUD with AJAX using VueJS */
Route::get('manage-vue', 'VueItemController@manageVue');
Route::resource('vueitems','VueItemController');
