@extends('navegador')

@section('Contenido')
    <h1>Editar Ambiente</h1>
    <form action="{{Route('Amb.Update',$ambiente->id_ambiente)}}"
        method="POST">
        @csrf
        @method('PUT')
        <label> Nombre: </label>
        <input type="text" name="nombre" value="{{$ambiente->nombre}}"> <br>

        <label> Descripcion: </label> <br>
        <textarea name="descripcion" id="" cols="30" rows="4"
                 > {{$ambiente->descripcion}}</textarea><br>

        <label> Capacidad: </label>
        <input type="number" name="capacidad"
        value="{{$ambiente->capacidad}}"><br>

        <label> Estado: </label>
        <input type="text" name="estado"
        value="{{$ambiente->estado}}"><br>

        <button type="submit">Guardad</button>

    </form>

@endsection
