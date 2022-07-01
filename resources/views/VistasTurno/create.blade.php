@extends('navegador')

@section('Contenido')
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto bg-white p-12">

        <form action="{{ Route('Turno.store') }}" method="post">
            @csrf
            <div class="grid gap-6 mb-6 lg:grid-cols">
                <div class="mb-1">
                    <label for="descripcion" class="mb-3 block text-base font-medium text-[#07074D]">
                        Descripcion:
                    </label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="4"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                </div>
                <div>
                    <label for="hora_entrada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hora
                        de entrada</label>
                    <input type="time" id="hora_entrada" name="hora_entrada"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" required>
                </div>
                <div>
                    <label for="hora_salida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hora de
                        salida</label>
                    <input type="time" id="hora_salida" name="hora_salida"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" required>
                </div>
            </div>
            <div>

                <div class="grid gap-6 grid-cols-2">
                    <a href="{{ Route('Turno.index') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        volver
                    </a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Crear
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
