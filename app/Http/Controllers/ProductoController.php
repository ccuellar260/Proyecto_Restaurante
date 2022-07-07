<?php

namespace App\Http\Controllers;

use App\Events\BProductoEditEvent;
use App\Events\BProductoDeleteEvent;
use App\Events\BProductoCreateEvent;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Support\Facades\DB;

use App\Models\DetallePedido;


use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tabla = DB::table('productos')
        ->join('tipo_productos','productos.id_tipo_plato','=','tipo_productos.id_tipo_plato')
        ->get();

        return view('VistasProductos.index', compact('tabla'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipo = DB::table('tipo_productos')->get();
        return view('VistasProductos.create',compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->url = $request->url;
        $producto->precio = $request->precio;
        $producto->cantidadMomento = $request->cantidad;
        $producto->cantidadActualizar = $request->cantidad;
        $producto->id_tipo_plato = $request->tipo;
        $producto->save();

        event(new BProductoCreateEvent($producto));

        return redirect()->Route('Producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $Producto)
    {
        $tipo = DB::table('tipo_productos')->get();
        return view('VistasProductos.edit',['Producto'=>$Producto,'tipo'=>$tipo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $Producto)
    {

        $Producto->nombre = $request->nombre;
        $Producto->descripcion = $request->descripcion;
        $Producto->url = $request->url;
        $Producto->precio = $request->precio;
        $Producto->id_tipo_plato = $request->tipo;
        $Producto->save();


        event(new BProductoEditEvent($Producto));

        return redirect()->Route('Producto.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $Producto)
    {
        event(new BProductoDeleteEvent($Producto));

        $Producto->delete();
        return redirect()->Route('Producto.index');
    }

    public $fecha_marcadad = '2022-06-25';
    public function RestCantPlatos(){
        if ( $this->fecha_marcadad != date('Y-m-d')) {
            echo ' verdadero';
            //cambiar de cantidad momento
            $productos = Producto::get();
            foreach ($productos as $p ) {
            $p->cantidadMomento = $p->cantidadActualizar;
            $p->save();
            }
            //vovler a marac la fecha
            $this->fecha_marcadad =  date('Y-m-d');
       }
        return;
    }

    public function consultas (){
       $productos = Producto::get();
       //mostrar las cantidad de veces que se vendio tal producto
      // $pedidos = Pedido::get();
       $suma = DetallePedido::sum('cantidad')->groupBy('id_producto')->get();
       dd($suma);
    //    $sum = DB::table('detalle_pedidos')
    //    ->select(DB::raw('sum('cantidad') as Total, id_producto'))
    //    ->groupBy('id_producto')
    //    ->get();
       return view('VistasProductos.consultas',compact('productos'));
    }

    public function bitacoraProductos(){

        $producto = DB::table('bitacora_productos as bp')
                        // ->when(Request('id'),function($q){
                        //     return $q->where('bp.id',Request('id'));
                        // })
                        ->when(Request('user'),function($q){
                            return $q->where('bp.user',Request('user'));
                        })
                        ->when(Request('accion'),function($q){
                            return $q->where('bp.accion',Request('accion'));
                        })
                        ->when(Request('fecha'),function($q){
                            return $q->where('bp.fecha',Request('fecha'));
                        })
                        ->when(Request('hora'),function($q){
                            return $q->where('bp.hora',Request('hora'));
                        })
                        ->when(Request('producto'),function($q){
                            return $q->where('bp.producto',Request('id_producto'));
                        })
                        ->when(Request('nombre'),function($q){
                            return $q->where('bp.nombre',Request('nombre'));
                        })
                        ->when(Request('descripcion'),function($q){
                            return $q->where('bp.descripcion',Request('descripcion'));
                        })
                        ->when(Request('precio'),function($q){
                            return $q->where('bp.precio',Request('precio'));
                        })
                        ->when(Request('cantidadActualizar'),function($q){
                            return $q->where('bp.cantidadActualizar',Request('cantidadActualizar'));
                        })
                        ->when(Request('url'),function($q){
                            return $q->where('bp.url',Request('url'));
                        })
                        ->when(Request('id_tipo_plato'),function($q){
                            return $q->where('bp.id_tipo_plato',Request('id_tipo_plato'));
                        })
                        ->get();

           return view('VistasProductos.bitacoraProductos',compact('producto'));

        }
}
