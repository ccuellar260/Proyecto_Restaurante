@extends('navegador')

@section('Contenido')
    <!-- This is an example component -->
    <div class="w-2/5 mx-auto bg-white p-12">

        <form action="{{ route('Reserva.update', $todos->id_reserva) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                <div>
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                    <input type="text" name="cliente"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" value="{{ $todos->nombre_cliente }}">
                </div>
                <div>
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha</label>
                    <input type="date" name="fecha"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" value="{{ $todos->fecha }}">
                </div>
                <div>
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hora</label>
                    <input type="time" name="hora"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" value="{{ $todos->hora }}">
                </div>
                <div class="form-group">
                    <label for="nro_mesa">Mesa</label>
                    <br>
                    @foreach ($detalles as $detalle)
                        <input type="checkbox" name="nro_mesa">{{ $detalle->nro_mesa }}
                        <br>
                    @endforeach
                </div>
                <br>
            </div>
            <div class="grid gap-6 grid-cols-2">
                <a href="{{ Route('Reserva.index') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    volver
                </a>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Guardar
                </button>
            </div>
        </form>

    </div>
@endsection
