@extends('navegador')

@section('Contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Gestionar Productos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>
                                        <button><a href="{{Route('Producto.create')}}">Crear Producto</a></button>
                                    </p>
                                    {{-- mostrar lista de reservas --}}
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nro</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Tipo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tabla as $r)
                                                <tr>
                                                    <td>
                                                        <img src="{{$r->url}}"  width="30" height="30">
                                                    </td>
                                                    <td>{{$r->id_producto}} |</td>
                                                    <td>{{$r->nombre}} |</td>
                                                    <td>{{$r->descripcion}} |</td>
                                                    <td>{{$r->precio}} |</td>
                                                    <td>{{$r->cantidad}} |</td>
                                                    <td>{{$r->tipo}} |</td>
                                                    <td>
                                                        <a href="{{route('Producto.edit', $r->id_producto)}}" class="btn btn-warning">Editar</a>
                                                        <form action="{{Route('Producto.destroy', $r->id_producto)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit"
                                                                   value="Eliminar"
                                                                   onclick="return confirm('Desea Eliminar?')">


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
