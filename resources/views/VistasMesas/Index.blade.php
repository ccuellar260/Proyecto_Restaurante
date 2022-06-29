@extends('navegador')

@section('Contenido')
    <div class="bg-white flex p-3 shadow-sm mt-2">
        <h6 class="flex-grow text-2xl font-bold">Gestionar Mesa</h6>
        <button type="button"
            class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            <a href="{{Route('Mesas.create')}}">
                CREAR MESA
            </a>
        </button>
        <button type="button"
            class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            <a href="{{Route('Amb.index')}}">
                GESTIONAR AMBINETE
            </a>
        </button>

    </div>
    <div class="grid grid-cols-5 gap-4 justify-items-center mt-2">
        @include('VistasMesas.listaMesas')
    </div>
@endsection
