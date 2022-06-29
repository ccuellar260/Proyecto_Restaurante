@extends('navegador')


@section('Contenido')

<table>
    <form action="{{Route('Turno.AsignarTurno')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccione un Turno</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_turno">
                @foreach ($turnos as $turno)
                <option value="{{$turno->id_turno}}">{{$turno->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccione un Empleado</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_empleado">
                @foreach ($empleados as $empleado)
                <option value="{{$empleado->ci}}">{{$empleado->nombre_completo}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar</button>
    </form>
</table>
@endsection
