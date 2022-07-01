<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //para saber con que usuario estamos logueados
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

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
    //$pp = producto
    //public $pp = new ProductoController;

    public function index(){

        $user = Auth::user()->nombre_usuario;
        //mostrar solo pedidos por pagar
        $pedidos = Pedido::where('estado','En Cocina')
                    ->orWhere('estado','Pedido Listo')
                    ->orWhere('estado','Realizar Pago')
                     ->get();
        //mostrar mesas disponibles
        $empleado = Empleado::join('users','empleados.nombre_usuario','=','users.nombre_usuario')
        ->where('empleados.nombre_usuario',$user)->first();

        $mesas = Mesa::where('estado','Disponible')
                     ->where('ci_empleado',$empleado->ci)->get();
        $mesasAdmin = Mesa::where('estado','Disponible')->get();

        $clientes = Cliente::get();
        return view('VistasPedido.pedido',compact('pedidos','mesas','empleado','mesasAdmin','clientes'));
    }

    public function storexd(Request $r){


        return redirect()->Route('Pedido.CrearPedido',$r->mesa);
    }

    public function crear_pedido(Mesa $mesa){
       // dd("llegue");
        //$producto = Producto::get();
        //metodo where (recibe el atributo,recibo la variable de comparacion)
        $platos = Producto::where('id_tipo_plato',1)->get();
        $bebidas = Producto::where('id_tipo_plato',2)->get();
        $postres = Producto::where('id_tipo_plato',3)->get();
      //  $user = Auth::user()->nombre_usuario;
     //   $empleado = Empleado::where('nombre_usuario',$user)->first();
     $user = Auth::user()->nombre_usuario;
     $empleado = Empleado::where('nombre_usuario',$user)->first();
        $emp = $empleado->ci;
        $me= $mesa->nro_mesa;

        return view('VistasPedido.crearPedido',[
            'ci'=>$emp,
            'nro_mesa'=>$me,
            'platos'=>$platos,
            'bebidas'=>$bebidas,
            'postres'=>$postres
        ]);
    }





    public function storePedido(Request $r){
        $pedido = new Pedido();
        $pedido->nro_mesa = $r->mesa;
        $pedido->ci_empleado = $r->empleado;
        $pedido->estado = 'En Cocina';
        $pedido->save();

        //poner mesa en ocupado
        $mesa = Mesa::where('nro_mesa',$r->mesa)->first();
        $mesa->estado = 'Ocupado';
        $mesa->save();

        $count = count($r->producto);
        for ($i=0; $i < $count; $i++)
            if($r->cantidad[$i]>0){
            $detalle = new DetallePedido();
            $detalle->id_pedido= $pedido->id_pedido;
            $detalle->id_producto = $r->producto[$i];
            $detalle->cantidad = $r->cantidad[$i];
            $detalle->precio = (float)$r->precio[$i]* (float)$r->cantidad[$i];
            $detalle->fecha = date('Y-m-d');
            $detalle->hora = date('H:i:s');
            $detalle->save();
             }
        return redirect()->Route('Pedido.index');
    }

    //cambair estados
    public function StoreRealizarPago(Pedido $pedido){
        $pedido->estado = 'Realizar Pago';
        $pedido->save();
        return redirect()->Route('Pedido.index');
    }

    public function destroy(Pedido $pedido){
        $pedido->delete();
        return redirect()->Route('Pedido.index');
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



        $de = DetallePedido::join('productos','detalle_pedidos.id_producto','=','productos.id_producto')
                                  ->where('id_pedido',$pe->id_pedido)->get();

        return view('VistasPedido.editarPedidos',[
                'detalles'=>$de,
                'pedido'=>$pe
                 ]);
    }
//-- Consultar Pedidos -----------------------------------------------------------//
    public function consultarPedidos(Request $r){

//        $pedidos =  DB::table('pedidos as p')
//        ->join('empleados as e','e.ci','=','p.ci_empleado')
//    //    ->where('id_pedido',3)
//        ->where('e.nombre_completo','LIKE','M'.'%')
//        ->get();
//        dd($pedidos);



        $pagados = DB::table('pedidos as p')
                 //   ->with(['empleados'])
                    ->join('recibos as r','r.id_pedido','=','p.id_pedido')
                    ->join('clientes as c','c.ci','=','r.ci_cliente')
                    ->join('empleados as e','e.ci','=','p.ci_empleado')
                    ->select('r.id_recibo','c.nombre_completo as cliente',
                            'c.ci as ci_cliente','e.ci as ci_empleado',
                            'e.nombre_completo as empleado','p.*')



                                //  ->orWhereHas('pedidos',function($r) {
                                //         return $q->where('p.id_pedido',Request('pedido'));
                                //     });
                                // })->get();
                                ->when(Request('mesero'),function($q){
                                    return $q->where('e.nombre_completo','like','%'.Request('mesero').'%')
                                             ->orWhere('e.ci','like','%'.Request('mesero').'%')
                                             ->orWhere('e.nombre_usuario','like','%'.Request('mesero').'%');
                                            })->get();

        $por_pagar = DB::table('pedidos as p')
                    ->join('empleados as e','e.ci','=','p.ci_empleado')
                    ->where('estado','Realizar Pago')
                    ->orWhere('estado','En Cocina')->get();
        return view('VistasPedido.consultarPedidos',compact('pagados','por_pagar'));
       //return view('prueba',compact('pedidos'));

    }



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
