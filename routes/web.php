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

Route::get('/' , 'controladora@entrada');
Route::get('cuenta','controladora@meterseperfil');
Route::get('perfil', 'controladora@logueado');
Route::get('login', 'controladora@login');
Route::get('foro', 'controladora@foro');
Route::get('foro/{nombre}', 'controladora@foronombres' );
Route::get('foro/temas/{nombre}', 'controladora@temas' );
Route::get('registro', 'controladora@singUp');
Route::post('singUp', 'controladora@registrocompletado');
Route::get('foro/{nombre}/creartema', 'controladora@creartema');