<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@empleado_store')->name('empleado_store');
Route::get('/home/empleado/edit/{empleado}', 'HomeController@editEmpleado')->name('empleado_edit');
Route::put('/home/empleado/edit/{empleado}', 'HomeController@updateEmpleado')->name('empleado_update');
Route::delete('/home/empleado/destroy/{empleado}', 'HomeController@deleteEmpleado')->name('empleado_delete');


