@extends('navegador')

@section('Contenido')
    <div class="bg-white flex p-3 shadow-sm mt-2">
        <h6 class="flex-grow text-2xl font-bold">Gestionar Mesa</h6>
        <button type="button"
            class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            <a href="{{ Route('Mesas.create') }}">
                CREAR MESA
            </a>
        </button>
    
    </div>
    <div class="grid grid-cols-5 gap-4 justify-items-center mt-2">
        @foreach ($tabla as $r)
            <div class="w-46 h-48">
                <div
                    class="bg-yellow-200 w-44 h-44 hover:bg-neutral-700 rounded-full flex flex-col justify-center gap-1 items-center ">
                    <div>
                        <p class="text-4xl font-bold">{{ $r->nro_mesa }}</p>
                    </div>
                    <div>
                        <p>{{ $r->mesa }}</p>
                    </div>
                </div>
                <div class="flex justify-center mt-2">
                    <button type="button"
                        class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                        <a href="{{ Route('Mesas.edit', $r->nro_mesa) }}" class="pr-3 pl-3">
                            EDITAR
                        </a>
                    </button>
                    <button type="button"
                        class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                        <form action="{{ Route('Mesas.destroy', $r->nro_mesa) }}" method="POST">
                            @csrf
                            <!-- token de seguridad-->
                            @method('DELETE')

                            <!-- mostar boton eliminar-->
                            <input type="submit" value="ELIMINAR" class=""
                                onclick="return confirm('Desea Eliminar?')">
                            <!-- volver a preguntar si desea eliminar -->
                        </form>
                    </button>




                </div>
            </div>
        @endforeach
    </div>
@endsection
