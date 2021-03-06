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
    return redirect()->Route('Dashboard');
})->middleware('auth');//si no estoy logueado retorname a login

           //nombre clase, nombre de metodo  //-> name es el nombre de ruta
Route::resource('Rol', RolController::class)->except(['show'])
->middleware('auth');

Route::resource('Empleado', EmpleadoController::class)->except(['show','update'])->middleware('auth')->middleware('ExisteCorreo'); //->middleware('Admin')
Route::resource('Mesas', MesaController::class)->except(['show'])
->middleware('auth');

Route::get('Mesas/listas', [MesaController::class,'listas'])->name('listas');
Route::get('Empleado/asignarMesa/{ci}', [EmpleadoController::class,'asignarMesa'])
->name('Empleado.asignarMesa')->middleware('auth');
Route::put('Empleado/{Empleado}', [EmpleadoController::class,'update'])
->name('Empleado.update')->middleware('auth')->middleware('ConfirmarContra');
Route::post('Empleado/asignarMesa/{ci}', [EmpleadoController::class,'StoreAsignarMesa'])
->name('Empleado.StoreAsignarMesa')->middleware('auth');

Route::resource('Producto', ProductoController::class)->except(['show'])
->middleware('auth');
Route::get('Producto/Consultas',[ProductoController::class,'consultas'])
->name('Producto.consultas')->middleware('auth');


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
     'storexd'])->name('Pedido.storexd')->middleware('SelectMesa');
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
Route::get('Pedido/{pe}/edit',[PedidosController::class,'editarPedido'])
     ->name('Pedido.editarPedido');
Route::put('Pedido/{pe}/update',[PedidosController::class,'updatePedido'])
     ->name('Pedido.updatePedido')->middleware('ProductoCantidad');
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
//Generar Recibo en PDF

// Route::view("generarRecibos",'VistasPedido/generarRecibos')->name('recibos');

Route::get('pdf',[PedidosController::class,'pdf'])->name('pdf');

Route::delete('Pedidos/{pedido}',[PedidosController::class,'destroy'])
     ->name('Pedido.destroy');


Route::get('Pedido/pdfxd',[PedidosController::class,'pdfxd'])
    ->name('Pedido.pdfxd');



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
Route::get('ResertContrasena',[AuthController::class,'resertContrasena'])
     ->name('Login.resertContrasena');
Route::put('ResertContrasena/{user}',[AuthController::class,'updateContrasena'])
     ->name('Login.updateContrasena');


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


//Reservas ConfirmarReserva
Route::resource('Reserva', ReservaController::class)->except(['show','store'])
     ->middleware('auth');
Route::post('Reserva/Create', [ReservaController::class,'store'])
      ->name('Reserva.store')->middleware('auth')->middleware('ConfirmarReserva');
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


// rutas de bitacoras
Route::get('Bitacora/Sesiones',[AuthController::class,'bitacoraSeciones'])
    ->name('bitacoraSeciones')->middleware('auth');
Route::get('Bitacora/Clientes',[ClienteController::class,'bitacoraClientes'])
    ->name('Cliente.bitacora')->middleware('auth');
Route::get('Bitacora/Empleados',[EmpleadoController::class,'bitacoraEmpleados'])
    ->name('Empleado.bitacora')->middleware('auth');
Route::get('Bitacora/Pedidos',[PedidosController::class,'bitacoraPedidos'])
    ->name('Pedido.bitacora')->middleware('auth');
Route::get('Bitacora/Productos',[ProductoController::class,'bitacoraProductos'])
    ->name('Producto.bitacora')->middleware('auth');
Route::get('Bitacora/Reservas',[ReservaController::class,'bitacoraReservas'])
    ->name('Reserva.bitacora')->middleware('auth');


//rutas de PERMISOS

Route::get('Permisos',[RolController::class,'crearPermisos'])->name('Permiso.create')->middleware('auth');
Route::post('Permisos',[RolController::class,'storePermisos'])->name('Permiso.store')->middleware('auth');
Route::get('Permisos/{rol}/edit',[RolController::class,'editPermisos'])->name('Permiso.edit')->middleware('auth');
Route::put('Permisos/{rol}',[RolController::class,'updatePermisos'])->name('Permiso.update')->middleware('auth');
Route::delete('Permisos/{rol}',[RolController::class,'deletePermisos'])->name('Permiso.deletePermisos')->middleware('auth');
