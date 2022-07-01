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

Route::resource('Empleado', EmpleadoController::class)->except(['show','update'])->middleware('auth'); //->middleware('Admin')
Route::resource('Mesas', MesaController::class)->except(['show'])
->middleware('auth')->middleware('Admin');

Route::get('Mesas/listas', [MesaController::class,'listas'])->name('listas');
Route::get('Empleado/asignarMesa/{ci}', [EmpleadoController::class,'asignarMesa'])
->name('Empleado.asignarMesa')->middleware('auth')->middleware('Admin');
Route::put('Empleado/{Empleado}', [EmpleadoController::class,'update'])
->name('Empleado.update')->middleware('auth')->middleware('ConfirmarContra');
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
Route::get('Pedidos',[PedidosController::class,'index'])
     ->name('Pedido.index')->middleware('auth');
Route::get('Consultar/Pedidos',[PedidosController::class,'consultarPedidos'])
     ->name('Pedido.consultar')->middleware('auth');
Route::post('Pedidos/storexd',[PedidosController::class,
     'storexd'])->name('Pedido.storexd');
Route::get('Pedidos/CrearPedido/{mesa}',[PedidosController::class,
     'crear_pedido'])->name('Pedido.CrearPedido');
Route::post('Pedidos/Detallles',[PedidosController::class,'storePedido'])
     ->name('Pedido.storePedido')->middleware('ProductoCantidad');
Route::put('Pedidos/storePedidoListo/{p}',[PedidosController::class,'storePedidoListo'])
     ->name('Pedido.storePedidoListo');

Route::delete('Pedidos/{pedido}',[PedidosController::class,'destroy'])
     ->name('Pedido.destroy');
Route::get('Pedido/{pe}/Detalle',[PedidosController::class,'mostrarDetalle'])
     ->name('Pedido.mostrarDetalles');
Route::get('Pedido/{pe}/edit',[PedidosController::class,'editarDetalles'])
     ->name('Pedido.editarDetalles');
Route::get('Pedido/{p}/crearRecibo',[PedidosController::class,'crearRecibo'])
    ->name('Pedido.crearRecibo');
Route::post('Pedido/{p}/storeRecibo',[PedidosController::class,'storeRecibo'])
    ->name('Pedido.storeRecibo');
Route::get('Pedido/{recibo}/generarRecibo',[PedidosController::class,'generarRecibo'])
    ->name('Pedido.generarRecibo');
Route::put('Pedido/RefreshProduc',[PedidosController::class,'RestCantPlatos'])
    ->name('Pedido.RestCantPlatos');
//store pedidos
Route::put('Pedido/StoreRealizarPago/{pedido}',[PedidosController::class,'StoreRealizarPago'])
    ->name('Pedido.StoreRealizarPago');


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


//Reservas
Route::resource('Reserva', ReservaController::class)->except(['show'])
     ->middleware('auth');
Route::get('Reserva/{reserva}',[ReservaController::class,'verReserva'])
     ->name('Reserva.verReserva');

//Turno
Route::resource('Turno', TurnoController::class)->except(['show'])
     ->middleware('auth');

Route::get('Turno/Asignar', [TurnoController::class, 'Asignar'])
     ->name('Turno.Asignar');

Route::post('Turno/AsignarTurno', [TurnoController::class, 'AsignarTurno'])
     ->name('Turno.AsignarTurno');

//marcar entrada y salida
Route::post('marcarEntrada', [AuthController::class, 'marcarEntrada'])
     ->name('marcarEntrada');

Route::put('marcarSalida/{marcado}', [AuthController::class, 'marcarSalida'])
     ->name('marcarSalida');
