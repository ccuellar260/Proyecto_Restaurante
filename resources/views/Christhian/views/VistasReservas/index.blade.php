@extends('navegador')


@section('Contenido')

<a class="btn btn-primary" href="{{Route('Reserva.create')}}" role="button">Hacer Reserva</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Mesa</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Cliente</th>
            <th scope="col">Empleado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservas as $reserva)
        <tr>
            <th scope="row">{{$reserva->id_reserva}}</th>
            <td>{{$reserva->fecha}}</td>
            <td>{{$reserva->hora}}</td>
            <td>{{$reserva->nro_mesa}}</td>
            <td>{{$reserva->cantidad}}</td>
            <td>{{$reserva->nombre_cliente}}</td>
            <td>{{$reserva->nombre_empleado}}</td>
            <td>
                <a href="{{Route('Reserva.edit',$reserva->id_reserva)}}" class="btn btn-primary">Editar</a>
                <form action="{{Route('Reserva.destroy',$reserva->id_reserva)}}" method="POST">
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
