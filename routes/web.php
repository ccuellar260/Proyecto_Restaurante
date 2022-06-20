<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TurnoController;

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
})->middleware('auth');//si no estoy logueado retorname a login

           //nombre clase, nombre de metodo  //-> name es el nombre de ruta
Route::resource('Rol', RolController::class)->except(['show'])
->middleware('auth');

Route::resource('Empleado', EmpleadoController::class)->except(['show'])->middleware('auth')->middleware('Admin');
Route::resource('Mesas', MesaController::class)->except(['show'])
->middleware('auth')->middleware('Admin');
Route::get('Empleado/asignarMesa/{ci}', [EmpleadoController::class,'asignarMesa'])
->name('Empleado.asignarMesa')->middleware('auth')->middleware('Admin');
Route::post('Empleado/asignarMesa/{ci}', [EmpleadoController::class,'StoreAsignarMesa'])
->name('Empleado.StoreAsignarMesa')->middleware('auth')->middleware('Admin');

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
     ->name('Pedido')->middleware('auth');
Route::get('Pedidos',[PedidosController::class,'consultarPedidos'])
     ->name('Pedido.consultar')->middleware('auth');
Route::post('Pedidos',[PedidosController::class,'storePedido'])
     ->name('Pedidos.StorePedido');
Route::get('Pedidos/{pedido}/CrearPedido}',[PedidosController::class,
     'crear_pedido'])->name('Pedido.Create');
Route::post('Pedidos/Detallles',[PedidosController::class,'storeDetalles'])
     ->name('Pedido.storeDetalles')->middleware('ProductoCantidad');
Route::delete('Pedidos/{pedido}',[PedidosController::class,'destroy'])
     ->name('Pedido.destroy');
Route::get('Pedido/{pe}/Detalle',[PedidosController::class,'mostrarDetalle'])
     ->name('Pedido.mostrarDetalles');
Route::get('Pedido/{pe}/edit',[PedidosController::class,'editarDetalles'])
     ->name('Pedido.editarDetalles');
Route::get('Pedido/{pe}/Pago',[PedidosController::class,'RealizarPago'])
    ->name('Pedido.RealizarPago');


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
     ->name('Dashboard')->middleware('auth');//si no estoy logueado retorname a login
Route::post('Logout',[AuthController::class,'logout'])
     ->name('Logout');


//gestion recibo



//Gestion de clientes
Route::get('Cliente',[ClienteController::class,'index'])
     ->name('Cliente.index');
Route::get('Cliente/Create',[ClienteController::class,'create'])
     ->name('Cliente.Create');
Route::post('Cliente/Create',[ClienteController::class,'store'])
     ->name('Cliente.Store');
Route::get('Cliente/Edit/{ci}',[ClienteController::class,'edit'])
     ->name('Cliente.edit');
Route::put('Cliente/Edit/{cliente}',[ClienteController::class,'update'])
     ->name('Cliente.Update');
Route::delete('Cliente/Dell/{cliente}',[ClienteController::class,'destroy'])
     ->name('Cliente.Destroy');


//qeu onda putoo!! Reservas
Route::resource('Reserva', ReservaController::class)->except(['show'])
     ->middleware('auth');
Route::get('Reserva/{reserva}',[ReservaController::class,'verReserva'])
     ->name('Reserva.verReserva');

     //qeu onda putoo!! Turno
Route::resource('Turno', TurnoController::class)->except(['show'])
     ->middleware('auth');

