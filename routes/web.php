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

use App\User;

Route::get('/', function () {
    return view('index');
});

Route::get('/Persona', function () {
	if( !Session::get('session') || !User::find(Session::get('session'))->person()->first()['id'] ) {
       return redirect('/');
    }
    
    return view('Persona.index');
});

Route::get('/Punto', function () {
	if( !Session::get('session') || User::find(Session::get('session'))->person()->first()['id'] ) {
       return redirect('/');
    }

    return view('Punto.index');
});

Route::post('/User/SingIn', 'UserController@SingIn');
Route::get('/User/SingOut', 'UserController@SingOut');
Route::get('/User/Check', 'UserController@CheckSession');

Route::get('/Categoria/All', 'CategoriaController@GetAll');
Route::get('/Categoria/Punto', 'CategoriaController@CategoriesForPoint');

Route::post('/Elemento', 'ElementoController@Save');
Route::get('/Elemento/Disponibles', 'ElementoController@SearchElementsByCategories');
Route::get('/Elemento/SubidosPersona', 'ElementoController@SearchElementsAvaibleByPerson');

Route::post('/Punto/Categorias', 'PuntoController@SaveCategoriesPrices');

Route::post('/Acuerdo', 'AcuerdoController@Save');
Route::post('/Acuerdo/PuntoCerrar', 'AcuerdoController@ClosePoint');
Route::post('/Acuerdo/PersonaCerrar', 'AcuerdoController@ClosePerson');
Route::get('/Acuerdo/Punto', 'AcuerdoController@SearchContactPoint');
Route::get('/Acuerdo/Punto/Realizados', 'AcuerdoController@SearchContactPointDone');
Route::get('/Acuerdo/Persona', 'AcuerdoController@SearchContactPerson');

Route::get('/Facturacion', 'AcuerdoController@Facture');
