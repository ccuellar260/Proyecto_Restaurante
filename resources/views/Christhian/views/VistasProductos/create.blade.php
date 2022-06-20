@extends('navegador')

@section('Contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Gestionar Producto</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- mostrar lista de reservas --}}
                                <form action="{{Route('Producto.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label><br>
                                        <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Detalle el producto Aqui"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Imagen</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Imagen">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
                                    </div>
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad= </label>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="0"
                                        max="9" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo">Cateogira</label>
                                        <select name="tipo">
                                            @foreach($tipo as $t)
                                                <option value="{{$t->id_tipo_plato}}">{{$t->Categoria}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
