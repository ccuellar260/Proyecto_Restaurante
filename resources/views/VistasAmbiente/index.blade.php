@extends('navegador')

@section('Contenido')

    <button><a href="{{Route('Amb.Create')}}">Crear un Ambiente</a></button>
    <br>
    @foreach ($ambientes as $a )
        <th>{{$a->nombre}} - {{$a->descripcion}} - {{$a->capacidad}}
            {{$a->estado}} -
            <button><a href="{{Route('Amb.edit',$a->id_ambiente)}}">Edit - </a></button>
            <form action="{{Route('Amb.Destroy',$a->id_ambiente)}}"
                method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </th>
    @endforeach

@endsection
