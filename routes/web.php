<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\AmbienteController;

//clase para usar validatioException
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
});

           //nombre clase, nombre de metodo  //-> name es el nombre de ruta
Route::resource('Rol', RolController::class)->except(['show'])->middleware('auth');

Route::resource('Empleado', EmpleadoController::class)->except(['show']);
Route::resource('Mesas', EmpleadoController::class)->except(['show']);

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
Route::get('Pedidos/{empleado}',[PedidosController::class,'index'])
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





     //PONER EN UN CONTROLADOR
//middleare('auth'); //verificar si estamos logeados
//mideleware('guest')//rediecciona si ya estamos logueamos
Route::view('Login','login')->name('login')->middleware('guest');
Route::view('Dashboard','dashboard')->name('dashboard')->middleware('auth');
Route::view('prueba','prueba')->name('prueba');
Route::view('formulario','formulario')->name('formulario');

Route::post('Login',function(){
    //del request solo sacame correo y contrasena
    $credenciales = request()->validate([
        'correo_electronico' =>['required','email','string'],
        'password'=>['required','string']
        ]);

    //filled, devuelve V o F si se dio click al inout recordar
    $recordar = request()->filled('recordar');

  //  Auth::attempt(['email' => $email, 'password' => $password],true o fals);
  // recibe credenciales y si desea recordar la contra, $recordar
    if (Auth::attempt($credenciales,$recordar)){//Es correcta la autentificacion
       //generar el token csrf
       request()->session()->regenerate();
       $bienvenida = 'Bienvenido '.(Auth::user()->nombre_usuario);
        return redirect('Dashboard')->with('status',$bienvenida);
    }//false, login incorrecto redireccionar devuelta login
     //distafar un error de validacion
     throw ValidationException::withMessages([
        //meustra el eeroror del correo
        'correo_electronico'=> __('auth.failed'),
     ]);

});

Route::view("Recibe",'VistasPedido.recibe')->name('recibe');

