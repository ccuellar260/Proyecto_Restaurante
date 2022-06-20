@extends('navegador')


@section('Contenido')


<form action="{{Route('Reserva.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha" class="focus:bg-white">
    </div>
    <div class="form-group">
        <label for="hora">Hora</label>
        <input type="time" class="form-control" id="hora" name="hora" placeholder="Ingrese la hora">
    </div>
    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad">
    </div>
    <div class="form-group">
        <label for="nro_mesa">Nro. de Mesa</label><br>
            @foreach ($mesas as $mesa)
            <input type="checkbox" name="nro_mesa">{{$mesa->nro_mesa}}<br>
            @endforeach
    </div>
    <div class="form-group">
        <label for="ci_cliente">Cliente</label>
        <select class="form-control" id="ci_cliente" name="ci_cliente">
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->ci}}">{{$cliente->nombre_completo}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ci_empleado">Empleado</label>
        <select class="form-control" id="ci_empleado" name="ci_empleado">
            @foreach ($empleados as $empleado)
            <option value="{{$empleado->ci}}">{{$empleado->nombre_completo}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{Route('Reserva.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection
