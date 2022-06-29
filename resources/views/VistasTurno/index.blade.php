@extends('navegador')


@section('Contenido')
    <button type="button"
        class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
        <a href="{{ Route('Turno.create') }}">
            Crear un Turno
        </a>
    </button>
    <button type="button"
        class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
        <a href="{{ Route('Turno.Asignar') }}">
        Asignar Turno
        </a>
    </button>

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
                    <th scope="row">{{ $turno->id_turno }}</th>
                    <td>{{ $turno->descripcion }}</td>
                    <td>{{ $turno->hora_entrada }}</td>
                    <td>{{ $turno->hora_salida }}</td>
                    <td>
                        <a href="{{ Route('Turno.edit', $turno->id_turno) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ Route('Turno.destroy', $turno->id_turno) }}" method="POST">
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
