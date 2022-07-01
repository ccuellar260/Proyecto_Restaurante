<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Support\Facades\DB;


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
        $producto->cantidad = $request->cantidad;
        $producto->id_tipo_plato = $request->tipo;
        $producto->save();
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
}
