<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedido;
use App\models\Empleado;
use App\models\Mesa;
use App\models\DetallePedido;
use App\models\Producto;
use App\models\User;

class PedidosController extends Controller
{

    public function index(User $user){

        $pedidos = Pedido::get();
        $mesas = Mesa::get();
        $empleado = Empleado::join('users',                            'empleados.nombre_usuario','=','users.nombre_usuario')
        ->where('empleados.nombre_usuario',$user->nombre_usuario)->first();
        return view('VistasPedido.pedido',compact('pedidos','mesas','empleado'));
    }

    public function crear_pedido(Pedido $pedido){

        //$producto = Producto::get();
        //metodo where (recibe el atributo,recibo la variable de comparacion)
        $platos = Producto::where('id_tipo_plato',1)->get();
        $bebidas = Producto::where('id_tipo_plato',2)->get();
        $postres = Producto::where('id_tipo_plato',3)->get();
        $emp = $pedido->ci_empleado;
        $me = $pedido->nro_mesa;

        return view('VistasPedido.crearPedido',[
            'ci'=>$emp,
            'nro_mesa'=>$me,
            'pedido'=>$pedido,
            'platos'=>$platos,
            'bebidas'=>$bebidas,
            'postres'=>$postres
        ]);
    }

    public function storePedido(Request $r){
        $pedido = new Pedido();
        $pedido->nro_mesa = $r->mesa;
        $pedido->ci_empleado = $r->empleado;
        $pedido->save();
        return redirect()->Route('Pedido.Create',$pedido);


    }

    public function storeDetalles(Request $r){
        $detalle = new DetallePedido();
        $detalle->id_pedido= $r->pedido;
        $detalle->id_producto = $r->producto;
        $detalle->cantidad = $r->cantidad;
        $detalle->fecha = '2022-06-06'; //hacer que dsevuelva fecha actua;
        $detalle->hora = '05:33:13'; //lo mismo de arriba pa la hora
        $detalle->save();

        return redirect()->Route('Pedido.Create',$detalle->id_pedido);
    }

    public function destroy(Pedido $pedido){
        $ci = $pedido->ci_empleado;
        $pedido->delete();
        return redirect()->Route('Pedido',$ci);
    }

    public function mostrarDetalle(Pedido $pe){
        $de = DetallePedido::join('productos',                            'detalle_pedidos.id_producto','=','productos.id_producto')
                                  ->where('id_pedido',$pe->id_pedido)->get();
        return view('VistasPedido.verPedido',[
                    'detalles'=>$de,
                    'pedido'=>$pe
                ]);
    }

    public function editarDetalles(Pedido $pe){
        $de = DetallePedido::join('productos',                            'detalle_pedidos.id_producto','=','productos.id_producto')
                                  ->where('id_pedido',$pe->id_pedido)->get();
                             
        return view('VistasPedido.editarPedidos',[
                'detalles'=>$de,
                'pedido'=>$pe
                 ]);
    }


}
