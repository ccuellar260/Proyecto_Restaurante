@extends('navegador')


@section('Contenido')


<form action="{{Route('Turno.store')}}" method="POST">
    @csrf

    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
    </div>

    <div class="form-group">
        <label for="hora_entrada">Hora de Entrada</label>
        <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" placeholder="Hora de Entrada">
    </div>

    <div class="form-group">
        <label for="hora_salida">Hora de Salida</label>
        <input type="time" class="form-control" id="hora_salida" name="hora_salida" placeholder="Hora de Salida">
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>

</form>



@endsection
