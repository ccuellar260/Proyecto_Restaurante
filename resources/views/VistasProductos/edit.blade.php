@extends('navegador')

@section('Contenido')
<div class="max-w-2xl mx-auto bg-white p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-center font-bold text-3xl mb-5">GESTIONAR PRODUCTO</h1>
            <form action="{{Route('Producto.update',$Producto->id_producto)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                <div class="grid gap-4 grid-cols-2">
                    <div class="mb-1">
                        <label for="nombre" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nombre Completo:
                        </label>
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre', $Producto->nombre)}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('nombre')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                            @enderror
                    </div>


                    <div class="mb-5">
                        <label for="tipo" class="mb-3 block text-base font-medium text-[#07074D]">
                            Categoria:
                        </label>
                        <select name="tipo" id="tipo"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="{{$tipoPlato->id_tipo_plato}}">{{$tipoPlato->Categoria}}</option>
                            @foreach ($tipo as $r)
                                @if ($r->id_tipo_plato != $tipoPlato->id_tipo_plato)
                                      <option value="{{$r->id_tipo_plato}}">{{$r->Categoria}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>



                </div>
                <div class="grid gap-4 grid-cols-3">
                    <div class="mb-1">
                        <label for="precio" class="mb-3 block text-base font-medium text-[#07074D]">
                            Precio:
                        </label>
                        <input type="number" step="any" name="precio" id="precio" value="{{old('precio', $Producto->precio)}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('precio')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                            @enderror
                    </div>
                    <div class="mb-5">
                        <label for="cantidadM" class="mb-3 block text-base font-medium text-[#07074D]">
                            Cantidad de Momento:
                        </label>
                        <input type="number" name="cantidadM" id="cantidadM" value="{{old('cantidadM', $Producto->cantidadMomento)}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('cantidadM')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                            @enderror
                    </div>
                    <div class="mb-5">
                        <label for="cantidadA" class="mb-3 block text-base font-medium text-[#07074D]">
                            Cantidad a Actualizar:
                        </label>
                        <input type="number" name="cantidadA" id="cantidadA" value="{{old('cantidadA', $Producto->cantidadActualizar)}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('cantidadA')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                            @enderror
                    </div>

                </div>
                <div class="mb-5">
                    <label for="url" class="mb-3 block text-base font-medium text-[#07074D]">
                        Imagen:
                    </label>
                    <input type="text" name="url" id="url" value="{{old('url', $Producto->url)}}" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('url')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                </div>
                <div class="mb-1">
                    <label for="Descripcion" class="mb-3 block text-base font-medium text-[#07074D]">
                        Descripcion:
                    </label>
                    <textarea name="descripcion" id="Descripcion" cols="30" rows="4"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{old('descripcion', $Producto->descripcion)}}</textarea>
                        @error('descripcion')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                </div>
                <div>
                    <button type="submit"
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
</div>
@endsection
