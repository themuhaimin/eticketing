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
//wisata
Route::get('api/wisata','WisataController@wisata');
Route::post('api/wisata/tambah','WisataController@add');

//blog
Route::get('api/blog','BlogController@blog');
Route::post('api/blog/tambah','BlogController@add');
Route::get('api/blog/{id}','BlogController@BlogDetails');

Route::get('api/ticket/{id}','TicketController@ticket');
