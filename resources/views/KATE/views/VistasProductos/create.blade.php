@extends('navegador')

@section('Contenido')
<div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
        <div class='max-w-md mx-auto space-y-6'>

            <form action="{{Route('Producto.store')}}" method="POST">
                @csrf
                <h2 class="text-2xl font-bold ">GESTIONAR PRODUCTOS</h2>
                <hr class="my-6">
                <div class="form-group">
                    <label for="descripcion">NOMBRE</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                <hr class="my-6">
                <div class="form-group">
                    <label for="descripcion">DESCRIPCION</label>
                    <br>
                    <textarea class="mt-2" name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Detalle el producto Aqui"></textarea>
                </div>
                <hr class="my-6">
                <div class="form-group">
                    <label for="descripcion">IMAGEN</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Imagen">
                </div>
                <hr class="my-6">
                <div class="form-group">
                    <label for="descripcion">PRECIO</label>
                    <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
                </div>
                <hr class="my-6">
                <div class="form-group">
                    <label for="descripcion">CANTIDAD</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="0"
                    max="9" min="0">
                </div>
                <hr class="my-6">
                <label class="uppercase text-sm font-bold opacity-70">CATEGORIA</label>
                <select name="tipo">
                    @foreach($tipo as $t)
                        <option value="{{$t->id_tipo_plato}}">{{$t->Categoria}}</option>
                    @endforeach
                </select>
                <hr class="my-6">
                <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="ENVIAR">
            </form>

        </div>
    </div>
</div>
@endsection
