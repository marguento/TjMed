<?php

Route::get('/', 'HomeController@index');
Route::resource('doctores', 'BusinessController@index');
Route::get('articulos', 'HomeController@articles');
Route::get('especialidades', 'HomeController@specialties');
Route::get('acerca', 'HomeController@about');
Route::get('contacto', 'HomeController@contact');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');
Route::resource('users', 'UsersController');
Route::get('admin/', 'AdminController@index');
Route::get('admin/usuarios', 'AdminController@usuarios');
Route::post('getSpecialties', 'BusinessController@getSpecialties');