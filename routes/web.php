<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ProductoController;

//clase para usar validatioException
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Validation\ValidationException;

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
})->middleware('auth');

           //nombre clase, nombre de metodo  //-> name es el nombre de ruta
Route::resource('Rol', RolController::class)->except(['show'])
->middleware('auth');

Route::resource('Empleado', EmpleadoController::class)->except(['show'])->middleware('auth')->middleware('Admin');
Route::resource('Mesas', MesaController::class)->except(['show'])
->middleware('auth')->middleware('Admin');
Route::get('Empleado/asignarMesa/{ci}', [EmpleadoController::class,'asignarMesa'])
->name('Empleado.asignarMesa')->middleware('auth')->middleware('Admin');

Route::resource('Producto', ProductoController::class)->except(['show'])
->middleware('auth')->middleware('Admin');


//Gestion de Ambinete
Route::get('Ambiente',[AmbienteController::class,'index'])
      ->name('Amb.index');
Route::get('Ambiente/Create',[AmbienteController::class,'create'])
      ->name('Amb.Create');
Route::post('Ambiente/Create',[AmbienteController::class,'store'])
      ->name('Amb.Store');
Route::get('Ambiente/Edit/{id_ambiente}',[AmbienteController::class,'edit'])
      ->name('Amb.edit');
Route::put('Ambiente/Edit/{ambiente}',[AmbienteController::class,'update'])
      ->name('Amb.Update');
Route::delete('Ambiente/Dell/{ambiente}',[AmbienteController::class,'destroy'])
      ->name('Amb.Destroy');

//Realizar Pedidos
Route::get('Pedidos/{user}',[PedidosController::class,'index'])
     ->name('Pedido');
Route::post('Pedidos',[PedidosController::class,'storePedido'])
     ->name('Pedidos.StorePedido');
Route::get('Pedidos/{pedido}/CrearPedido}',[PedidosController::class,
     'crear_pedido'])->name('Pedido.Create');
Route::post('Pedidos/Detallles',[PedidosController::class,'storeDetalles'])
     ->name('Pedido.storeDetalles');
Route::delete('Pedidos/{pedido}',[PedidosController::class,'destroy'])
     ->name('Pedido.destroy');
Route::get('Pedido/{pe}/Detalle',[PedidosController::class,'mostrarDetalle'])
     ->name('Pedido.smostrarDetalles');
Route::get('Pedido/{pe}/edit',[PedidosController::class,'editarDetalles'])
->name('Pedido.editarDetalles');



//ritas de prueba
Route::view('prueba','prueba')->name('prueba');
Route::view('formulario','formulario')->name('formulario');
Route::view("Recibe",'VistasPedido.recibe')->name('recibe');

//middleare('auth'); //verificar si estamos logeados
//mideleware('guest')//rediecciona si ya estamos logueamos
Route::get('Login',[AuthController::class,'login'])
     ->name('Login')->middleware('guest');
Route::post('Login',[AuthController::class,'loginStore'])
     ->name('LoginStore');
Route::get('Dashboard',[AuthController::class,'dashboard'])
     ->name('Dashboard')->middleware('auth');
Route::post('Logout',[AuthController::class,'logout'])
     ->name('Logout');



