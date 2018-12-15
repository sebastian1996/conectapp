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
    return view('index');
});

Route::get('/Persona', function () {
    return view('Persona.index');
});

Route::get('/Punto', function () {
    return view('Punto.index');
});

Route::post('/User/SingIn', 'UserController@singIn');

Route::get('/Categoria/All', 'CategoriaController@GetAll');

Route::post('/Elemento', 'ElementoController@Save');