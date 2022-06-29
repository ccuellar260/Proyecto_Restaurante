@extends('navegador')


@section('Contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Reserva</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Reserva.update', $todos->id_reserva) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <input type="text" name="cliente" value="{{$todos->nombre_cliente}}"><br>
                            </div>
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="{{ $todos->fecha }}">
                            </div>
                            <div class="form-group">
                                <label for="">Hora</label>
                                <input type="time" name="hora" class="form-control" value="{{ $todos->hora }}">
                            </div>

                            {{-- <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado" class="form-control">
                                    <option value="Pendiente" {{ $reserva->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="Confirmado" {{ $reserva->estado == 'Confirmado' ? 'selected' : '' }}>Confirmado</option>
                                    <option value="Cancelado" {{ $reserva->estado == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="nro_mesa">Mesa</label>
                                @foreach ($detalles as $detalle)
                                    <input type="checkbox" name="nro_mesa">{{$detalle->nro_mesa}}<br>
                                    {{-- <select name="nro_mesa" class="form-control">
                                            <option value="{{$detalle->nro_mesa}}">{{$detalle->nro_mesa}}</option>
                                    </select> --}}
                                @endforeach
                                <div class="form-group">
                                    <label for="">Cantidad de Mesas</label>
                                    <input type="number" name="cantidad_personas" class="form-control" value="{{ $detalle->cantidad }}">
                                </div>
                                    {{--
                                    @foreach($mesas as $mesa)
                                        <option value="{{ $mesa->nro_mesa }}">{{ $mesa->nro_mesa }}</option>
                                    @endforeach --}}

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            <div>
                                <a href="{{ route('Reserva.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
