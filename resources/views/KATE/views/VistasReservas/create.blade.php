@extends('navegador')


@section('Contenido')

<form action="{{Route('Reserva.store')}}" method="post">
    @csrf
    <h2 class="text-2xl font-bold ">CREAR RESERVA</h2>
    <hr class="my-6">
     <label class="uppercase text-sm font-bold opacity-70">FECHA</label>
     <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha" class="focus:bg-white">
     <hr class="my-6">
      <label class="uppercase text-sm font-bold opacity-70">HORA</label>
      <input type="time" class="form-control" id="hora" name="hora" placeholder="Ingrese la hora">
      <hr class="my-6">
       <div class="form-group">
        <label for="descripcion">CANTIDAD</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad">
        <hr class="my-6">
    <div class="form-group">
        <label for="nro_mesa">Nro. de Mesa</label><br>
            @foreach ($mesas as $mesa)
            <input type="checkbox" name="nro_mesa">{{$mesa->nro_mesa}}<br>
            @endforeach
    </div>
    <hr class="my-6">
    <label class="uppercase text-sm font-bold opacity-70">CLIENTE</label>
    <select class="form-control" id="ci_cliente" name="ci_cliente">
        @foreach ($clientes as $cliente)
        <option value="{{$cliente->ci}}">{{$cliente->nombre_completo}}</option>
        @endforeach
    </select>
    <hr class="my-6">
    <label class="uppercase text-sm font-bold opacity-70">EMPLEADO</label>
    <select class="form-control" id="ci_empleado" name="ci_empleado">
     @foreach ($empleados as $empleado)
     <option value="{{$empleado->ci}}">{{$empleado->nombre_completo}}</option>
     @endforeach
    </select>
    <hr class="my-6">
    <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="GUARDAR">
    <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="VOLVER">
</form>

</div>
</div>
</div>
@endsection
