@extends('navegador')

@section('Contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Gestionar Reservas</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>
                                        <button><a href="{{Route('Mesas.create')}}">Crear Mesa</a></button>
                                    </p>
                                    {{-- mostrar lista de reservas --}}
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Estado</th>
                                                <th>Tamaño</th>
                                                <th>Ubicación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tabla as $r)
                                                <tr>
                                                    <td>{{$r->nro_mesa}} |</td>
                                                    <td>{{$r->estado}} |</td>
                                                    <td>{{$r->mesa}} |</td>
                                                    <td>{{$r->nombre }} |</td>
                                                    <td>
                                                        <a href="{{route('Mesas.edit', $r->nro_mesa)}}" class="btn btn-warning">Editar</a>

                                                        <form action="{{Route('Mesas.destroy', $r->nro_mesa)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            
                                                            <input type="submit" value="ELIMINAR" class=""
                                                            onclick="return confirm('Desea Eliminar?')">
                                                        <!-- volver a preguntar si desea eliminar -->

                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
