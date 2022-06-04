<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EmpleadoController;

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

    return view('welcome',);
});

           //nombre clase, nombre de metodo  //-> name es el nombre de ruta
Route::resource('Rol', RolController::class)->except(['show']);

Route::resource('Empleado', EmpleadoController::class)->except(['show']);


