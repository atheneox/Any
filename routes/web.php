<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout',  'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('productos','ProductoController');
Route::resource('fabricas','FabricaController');
