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

/*Route::get('pdf','PdfController@getIndex');
Route::get('pdf/generar','PdfController@getGenerar');*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/servicios', function () {
    return view('servicios');
});


 
Route::resource('/reclamos', 'reclamosController'); 
Route::resource('/servicio', 'servicioController');
Route::resource('/observaciones', 'observacionesController');
Route::resource('/turbos', 'TurboController');
Route::resource('/ordenservicio', 'OrdenservicioController');
Route::resource('/informe', 'informeController');
Route::resource('/cotizacion', 'CotizacionController');

Route::get('autocomplete','TurboController@autocomplete')->name('autocomplete');
Route::get('recuperarmarca','TurboController@recuperarmarca')->name('recuperarmarca');
Route::get('recuperarturbos','TurboController@recuperarturbos')->name('recuperarturbos');
Route::get('recuperardni','servicioController@recuperardni')->name('recuperardni');
Route::get('/editmarca/{id}', 'TurboController@editmarca');

Route::get('/recuperaRuc/{id}', 'servicioController@recuperarRuc');
Route::get('/recuperarprof/{id}', 'servicioController@recuperarprof');
Route::get('/recuperarnro', 'reclamosController@recuperarnro');


Auth::routes();
Route::get('/logout', 'HomeController@logout');
Route::get('/home', 'servicioController@index')->name('home');
