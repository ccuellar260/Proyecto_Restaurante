<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambiente;

class AmbienteController extends Controller
{
    public function index(){
        $ambientes = Ambiente::get();
        return view('VistasAmbiente.index',compact('ambientes'));
    }

    public function create(){
        return view('VistasAmbiente.create');
    }

    public function store(Request $formulario){
        $ambiente = new Ambiente();
        $ambiente->nombre = $formulario->nombre;
        $ambiente->descripcion = $formulario->descripcion;
        $ambiente->capacidad = $formulario->capacidad;
        $ambiente->estado = $formulario->estado;
        $ambiente->save();
        return redirect()->Route('Amb.index');
    }

    public function edit(Ambiente $id_ambiente){
        return view('VistasAmbiente.edit',['ambiente'=> $id_ambiente]);
    }

    public function update(Request $formulario,Ambiente $ambiente){
        $ambiente->nombre = $formulario->nombre;
        $ambiente->descripcion = $formulario->descripcion;
        $ambiente->capacidad = $formulario->capacidad;
        $ambiente->estado = $formulario->estado;
        $ambiente->save();
        return redirect()->Route('Amb.index');
    }

    public function destroy(Ambiente $ambiente){
        $ambiente->delete();
    return redirect()->Route('Amb.index');
    }

}
