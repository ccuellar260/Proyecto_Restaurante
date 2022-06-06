<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//middleare('auth'); //verificar si estamos logeados
//mideleware('guest')//rediecciona si ya estamos logueamos
Route::view('Login','login')->name('login')->middleware('guest');
Route::view('Dashboard','dashboard')->name('dashboard');//->middleare('auth');

Route::post('Login',function(){
    $r = request()->only('correo_electronico','password');
    // usando la clase auth {autenticacion}

  //  Auth::attempt(['email' => $email, 'password' => $password]);
    if (Auth::attempt($r)){  //virificaion devuelve true si esta bien el inicio
       //generar el token csrf
       request()->session()->regenerate();
        return 'Login exitoso!'; //redireccionar a dasboard
    }
     return 'login falso!'; //redireccionar a login
});

