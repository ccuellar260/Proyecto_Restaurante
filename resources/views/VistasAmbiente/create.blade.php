@extends('navegador')

@section('Contenido')

    <h1>Registro de Ambiente </h1>
    <form action="{{Route('Amb.Store')}}"
        method="POST">
        @csrf
        <label> Nombre: </label>
        <input type="text" name="nombre"> <br>

        <label> Descripcion: </label> <br>
        <textarea name="descripcion" id="" cols="30" rows="4"></textarea><br>

        <label> Capacidad: </label>
        <input type="number" name="capacidad"><br>

        <label> Estado: </label>
        <input type="text" name="estado"><br>

        <button type="submit">registrar</button>

    </form>
@endsection
