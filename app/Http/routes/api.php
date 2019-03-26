<?php
use Illuminate\Http\Request;
Route::put('api/post/{id}','PostController@update')->middleware('auth:api');
Route::group(array('prefix'=>'api'),function(){
  Route::get('users','UserController@users');

});
Route::post('auth/register','AuthController@register');
Route::post('auth/login','AuthController@login');
Route::get('api/profile','UserController@profile')->middleware('auth:api');
Route::get('api/users/{id}','UserController@profileById')->middleware('auth:api');
Route::post('api/post','PostController@add')->middleware('auth:api');
