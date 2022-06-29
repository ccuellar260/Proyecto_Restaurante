@extends('navegador')

@section('Contenido')
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto bg-white p-12">

        <form action="{{ Route('Reserva.store') }}" method="post">
            @csrf
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="fecha"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha</label>
                    <input type="date" id="fecha" name="fecha"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required>
                </div>
                <div>
                    <label for="hora"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hora</label>
                    <input type="time" id="hora" name="hora"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" required>
                </div>
                <div>
                    <label for="cantidad"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                </div>
                <div>
                    <label for="ci_cliente"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente</label>
                    <select id="ci_cliente" name="ci_cliente"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->ci }}">{{ $cliente->nombre_completo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="nro_mesa">Nro. de Mesa</label><br>
                    <div class="grid gap-3 grid-cols-1">
                        @foreach ($mesas as $mesa)
                            @if ($mesa->mesa == 'Mesa para 2 personas')
                                    Mesa para 2 personas <br>
                                <input type="checkbox" name="nro_mesa[]" value="{{ $mesa->nro_mesa }}"> {{ $mesa->nro_mesa }}<br>
                            @elseif ($mesa->mesa == 'Mesa para 4 personas')
                                    Mesa para 4 personas <br>
                                <input type="checkbox" name="nro_mesa[]" value="{{ $mesa->nro_mesa }}"> {{ $mesa->nro_mesa }}<br>
                            @elseif ($mesa->mesa == 'Mesa para 6 personas')
                                    Mesa para 6 personas <br>
                                <input type="checkbox" name="nro_mesa[]" value="{{ $mesa->nro_mesa }}"> {{ $mesa->nro_mesa }}<br>
                            @endif
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="grid gap-6 grid-cols-3">
                    <a href="{{ Route('Reserva.index') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        volver
                    </a>
                    <a href="{{ Route('Reserva.index') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Crear cliente
                    </a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Guardar
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
