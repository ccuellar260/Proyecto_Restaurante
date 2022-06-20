@extends('navegador')


@section('Contenido')


<a class="btn btn-primary" href="{{Route('Turno.create')}}" role="button">Crear un Turno</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripción</th>
            <th scope="col">Hora de Entrada</th>
            <th scope="col">Hora de Salida</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($turnos as $turno)
        <tr>
            <th scope="row">{{$turno->id_turno}}</th>
            <td>{{$turno->descripcion}}</td>
            <td>{{$turno->hora_entrada}}</td>
            <td>{{$turno->hora_salida}}</td>
            <td>
                <a href="{{Route('Turno.edit',$turno->id_turno)}}" class="btn btn-primary">Editar</a>
                <form action="{{Route('Turno.destroy',$turno->id_turno)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
