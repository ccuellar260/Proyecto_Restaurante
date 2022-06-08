<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedido;
use App\models\Empleado;
use App\models\Mesa;
use App\models\DetallePedido;
use App\models\Producto;

class PedidosController extends Controller
{

    public function index(Empleado $empleado){
        $pedidos = Pedido::get();
        $mesas = Mesa::get();
        return view('VistasPedido.pedido',compact('pedidos','mesas','empleado'));
    }

    public function crear_pedido(Pedido $pedido){

        //$producto = Producto::get();
        //metodo where (recibe el atributo,recibo la variable de comparacion)
        $platos = Producto::where('id_tipo_plato',1)->get();
        $bebidas = Producto::where('id_tipo_plato',2)->get();
        $postres = Producto::where('id_tipo_plato',3)->get();

        return view('VistasPedido.crearPedido',[
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
        $detalle->fecha = '2022-06-06';
        $detalle->hora = '05:33:13';
        $detalle->save();


        return redirect()->Route('Pedido.Create',$detalle->id_pedido);
    }

    public function detalles(){


    }


}
