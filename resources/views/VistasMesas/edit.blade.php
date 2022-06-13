@extends('navegador')

@section('Contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Gestionar Mesas</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- mostrar lista de reservas --}}
                                <form action="{{Route('Mesas.update',$mesa->nro_mesa)}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <label for="estado">Estado</label>
                                    <input type="text" name="estado" value="{{$mesa->estado}}" id="estado" class="form-control">
                                    <br>
                                    <label for="mesa">Tamaño</label>
                                    <select name="mesa">
                                        @foreach ($tipo as $r)
                                        <option value="{{$r->id_tipo_mesa}}">{{$r->mesa}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label for="Ubicacion">Ubicación</label>
                                    <select name="Ubicacion">
                                    @foreach ($ambiente as $r)
                                        <option value="{{$r->id_ambiente}}">{{$r->nombre}}</option>
                                    @endforeach
                                    </select>
                                    <br>
                                    <button type="submit">enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
