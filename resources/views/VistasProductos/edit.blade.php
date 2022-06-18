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
                                {{-- mostrar lista de reservas --}}
                                <form action="{{Route('Producto.update',$Producto->id_producto)}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" value="{{$Producto->nombre}}" id="nombre" class="form-control">
                                    <br>

                                    <label for="Descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" value="{{$Producto->descripcion}}" id="Descripcion" class="form-control">
                                    <br>

                                    <label for="url">Imagen</label>
                                    <input type="text" name="url" value="{{$Producto->url}}" id="url" class="form-control">
                                    <br>

                                    <label for="Precio">Precio</label>
                                    <input type="text" name="precio" value="{{$Producto->precio}}" id="Precio" class="form-control">
                                    <br>

                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" name="cantidad" value="{{$Producto->cantidad}}" id="cantidad" class="form-control">
                                    <br>

                                    <label for="tipo">Categoria</label>
                                    <select name="tipo">
                                        @foreach ($tipo as $r)
                                        <option value="{{$r->id_tipo_plato}}">{{$r->Categoria}}</option>
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
