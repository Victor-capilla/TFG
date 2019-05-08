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
Route::view('/' , 'entrada');

Route::get('primera', 'controladora@login');

Route::view('login', 'login',['mensaje'=>'inicio']);
Route::view('registro', 'singUp',['mensaje'=>'inicio']);
Route::post('singUp', 'controladora@singUp',['mensaje'=>'inicio']);