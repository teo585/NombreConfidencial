<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('error', function () {
    abort(500);
});
/*Rutas de las Grids*/

Route::get('datosDependencia', function()
{
    include public_path().'/ajax/datosDependencia.php';
});

Route::get('datosDependenciaSelect', function()
{
    include public_path().'/ajax/datosDependenciaSelect.php';
});

/*Rutas de los controladores*/

Route::resource('dependencia','dependenciacontroller');
Route::resource('documento','documentocontroller');
Route::resource('dependenciaselect','dependenciaselectcontroller');
Route::resource('lista','ListaController');
Route::resource('sistemasinformacion','SistemaInformacionController');
Route::resource('normograma','normogramacontroller');
Route::resource('sitioweb','SitioWebController');
Route::resource('etiqueta','etiquetacontroller');

/**********************************Rutas sin controlador*********************************/



Route::get('serie', function () {
    return view('Serie');

});




Route::get('index', function () {
    return view('index');

});
Route::get('/', function () {
    return view('welcome');

});




