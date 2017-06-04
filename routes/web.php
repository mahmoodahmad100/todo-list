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
    if(Auth::user())
      return redirect()->route('items');
    return view('welcome');
})->name('home');

Route::get('sign_in_up',[
	'uses' => 'UserController@getSign_up_in',
	'as' => 'sign'
]);

Route::post('login',[
  'uses' => 'UserController@postLogin',
  'as' => 'login'
]);

Route::post('register',[
  'uses' => 'UserController@postRegister',
  'as' => 'register'
]);

Route::get('logout',[
  'uses' => 'UserController@getLogout',
  'as' => 'logout',
  'middleware' => 'auth'
]);

Route::get('items',[
  'uses' => 'ItemController@getItems',
  'as' => 'items',
  'middleware' => 'auth'
]);

Route::post('items',[
  'uses' => 'ItemController@postItems',
  'as' => 'items',
  'middleware' => 'auth'
]);

Route::put('items/{item_id}',[
  'uses' => 'ItemController@postEditItem',
  'as' => 'edit',
  'middleware' => 'auth'
]);

Route::delete('items/{item_id}',[
  'uses' => 'ItemController@postDeleteItem',
  'as' => 'delete',
  'middleware' => 'auth'
]);

