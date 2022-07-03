@extends('navegador')

@section('Contenido')
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto bg-white p-8 mt-8">

        <form action="{{Route('Turno.AsignarTurno')}}" method="post">
            @csrf
            <div class="grid gap-6 mb-6 lg:grid-cols">
                <div>
                    <label for="exampleFormControlSelect1"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente</label>
                    <select id="exampleFormControlSelect1" name="id_turno"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        @foreach ($turnos as $turno)
                            <option value="{{ $turno->id_turno }}">{{ $turno->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="exampleFormControlSelect1"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente</label>
                    <select id="exampleFormControlSelect1" name="id_empleado"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->ci }}">{{ $empleado->nombre_completo }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <div class="grid gap-6 grid-cols-3">
                        <div>

                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Crear
                        </button>
                    </div>
                </div>
        </form>

    </div>
@endsection
