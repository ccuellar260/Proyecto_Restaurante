<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //para saber con que usuario estamos logueados
use Illuminate\Support\Facades\DB;

use App\models\Pedido;
use App\models\Empleado;
use App\models\Mesa;
use App\models\DetallePedido;
use App\models\Producto;
use App\models\User;
use App\models\Cliente;
use App\models\Recibo;


class PedidosController extends Controller
{

    public function index(User $user){
        //mostrar solo pedidos por pagar
        $pedidos = Pedido::where('estado','Realizar Pago')->get();
        //mostrar mesas disponibles
        $mesas = Mesa::where('estado','Disponible')->get();

        $empleado = Empleado::join('users','empleados.nombre_usuario','=','users.nombre_usuario')
                            ->where('empleados.nombre_usuario',$user->nombre_usuario)->first();
        return view('VistasPedido.pedido',compact('pedidos','mesas','empleado'));
    }

    public function consultarPedidos(){
        //mostrar solo pedidos por pagar
        $pedidos = DB::table('pedidos as p')
                    ->join('empleados as e','e.ci','=','p.ci_empleado')
                    ->join('mesas as m','m.nro_mesa','=','p.nro_mesa')
                    ->join('tipo_mesas as t','t.id_tipo_mesa','=','m.id_tipo_mesa')
                    ->join('ambientes as a','a.id_ambiente','=','m.id_ambiente')
                    ->get();

        return; //view('VistasPedido.consultarPedidos',compact('pedidos'));
    }

    public function crear_pedido(Pedido $pedido){

        //$producto = Producto::get();
        //metodo where (recibe el atributo,recibo la variable de comparacion)
        $platos = Producto::where('id_tipo_plato',1)->get();
        $bebidas = Producto::where('id_tipo_plato',2)->get();
        $postres = Producto::where('id_tipo_plato',3)->get();
        $emp = $pedido->ci_empleado;
        $me = $pedido->nro_mesa;

        return view('prueba',[
            'ci'=>$emp,
            'nro_mesa'=>$me,
            'pedido'=>$pedido,
            'platos'=>$platos,
            'bebidas'=>$bebidas,
            'postres'=>$postres
        ]);
    }

    public function RefreshProduc(){
        $p = Producto::where('id_tipo_plato',1)->get();
        foreach ($p as $f){
            $f->cantidad = 30 ;
            $f->save();
        }
        $user = Auth::user()->nombre_usuario;
        return redirect()->Route('Pedido',compact('user'));
    }

    public function storePedido(Request $r){


        $pedido = new Pedido();
        $pedido->nro_mesa = $r->mesa;
        $pedido->ci_empleado = $r->empleado;
        $pedido->estado = 'Realizar Pago';
        $pedido->save();

        //poner mesa en ocupado
        $mesa = Mesa::where('nro_mesa',$r->mesa)->first();
        $mesa->estado = 'Ocupado';
        $mesa->save();
        return redirect()->Route('Pedido.Create',$pedido);
    }

    public function storeDetalles(Request $r){


        $count = count($r->producto);

        for ($i=0; $i < $count; $i++)
            if($r->cantidad[$i]>0){

            $detalle = new DetallePedido();
            $detalle->id_pedido= $r->pedido;
            $detalle->id_producto = $r->producto[$i];
            $detalle->cantidad = $r->cantidad[$i];
            $detalle->precio = (float)$r->precio* (float)$r->cantidad[$i];
            $detalle->fecha =$r->fecha;
            $detalle->hora = $r->hora;
            $detalle->save();
             }

        return redirect()->Route('Pedido.Create',$detalle->id_pedido);
    }

    public function destroy(Pedido $pedido){
        $user = Auth::user()->nombre_usuario;
        $pedido->delete();
        return redirect()->Route('Pedido',$user);
    }

    public function mostrarDetalle(Pedido $pe){

        $de = DetallePedido::join('productos','detalle_pedidos.id_producto','=','productos.id_producto')
                            ->select('detalle_pedidos.*','productos.nombre')
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

    public function crearRecibo(Pedido $p){
        $clientes = Cliente::get();

        $detalles = DetallePedido::join('productos as p','detalle_pedidos.id_producto','=','p.id_producto')
              ->select('detalle_pedidos.*','p.nombre','p.precio as prod_precio')
              ->where('id_pedido',$p->id_pedido)->get();
        return view('VistasPedido.crearRecibo',
               compact('clientes','detalles','p'));
    }

    public function storeRecibo(Request $re,Pedido $p)
    {       //poner mesa en disponible
         $mesa = Mesa::where('nro_mesa',$p->nro_mesa)->first();
         $mesa->estado = 'Disponible';
         $mesa->save();
         $p->estado = 'Pagado';
         $p->save();
        //guardar en la base de datos
        $recibo = new Recibo();
        $recibo->precio_total = $p->precio_total;
        $recibo->ci_cliente = $re->cliente;
        $recibo->id_pedido = $p->id_pedido;
        $recibo->save();
        return redirect()->Route('Pedido.generarRecibo',$recibo->id_recibo);

    }

    public function generarRecibo(Recibo $recibo)
    {
        // join recibo con cliente
        $recibo = Recibo::join('clientes','clientes.ci','=', 'recibos.ci_cliente')
                        ->join('pedidos','pedidos.id_pedido','=', 'recibos.id_pedido')
                        ->where('pedidos.id_pedido',$recibo->id_pedido)
                        ->where('ci', $recibo->ci_cliente)->first();

        // join detallepedido con producto
        $detalles = DetallePedido::join('productos as p','detalle_pedidos.id_producto','=','p.id_producto')
              ->select('detalle_pedidos.*','p.nombre','p.precio as prod_precio')
              ->where('id_pedido',$recibo->id_pedido)->get();
          //  ->where('id_pedido',$recibo->id_pedido)
          return view('VistasPedido.generarRecibo',
                 compact('recibo','detalles'));
    }


}
