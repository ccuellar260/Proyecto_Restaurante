@extends('navegador')

@section('Contenido')
    <!-- This is an example component -->
<div class="max-w-4xl mx-auto bg-white p-12">

        <form action="{{ route('Reserva.update', $todos->id_reserva) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div class="grid gap-6 mb-6 lg:grid-cols-1">
                    <div>
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                        <input type="text" name="cliente"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly
                            placeholder="" value="{{ ucwords($todos->nombre_cliente )}}">
                    </div>
                    <div>
                        <label for="fecha"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha</label>
                        <input type="date" id="fecha" name="fecha"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John" value="{{ $todos->fecha_reserva }}">
                    </div>
                    <div>
                        <label for="hora"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hora</label>
                        <input type="time" id="hora" name="hora"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Doe" value="{{ $todos->hora_reserva }}">
                    </div>

                </div>
                <div>
                    <div class="form-group">
                        <label for="nro_mesa">Nro. de Mesa</label><br>
                        <div >

                            @foreach ($mesas as $m)
                            <div class="overflow-x-auto p-3">
                                <table class="table-auto w-full">
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr></tr>
                                    </thead>

                                <tbody class="text-sm divide-y divide-gray-100">
                                <tr>
                                    <td class="p-2">
                                        <div class="flex justify-center">
                                            @if ($m->estado == 'Disponible')
                                                <input type="radio" name="mesa" id="" value="{{ $m->nro_mesa }}">
                                            @else
                                                <input type="radio" name="mesa" id="" value="{{ $m->nro_mesa }}" disabled>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-2">
                                        <div class="flex justify-center">
                                        <img  width="50" src="https://cdn-icons-png.flaticon.com/512/1535/1535032.png">
                                        </div>
                                    </td>

                                    <td class="p-2">
                                        <div class="font-medium text-gray-800">
                                        {{$m->nro_mesa}}
                                        </div>
                                    </td>

                                    @if ($m->estado == 'Disponible')
                                        <td class="p-2">
                                            <div class="text-left font-medium text-green-500">
                                            {{$m->estado}}
                                            </div>
                                        </td>
                                    @endif

                                    @if ($m->estado == 'Ocupado')
                                        <td class="p-2">
                                            <div class="text-left font-medium text-red-500">
                                            {{$m->estado}}
                                            </div>
                                        </td>
                                    @endif

                                    @if ($m->estado == 'Reserva')
                                        <td class="p-2">
                                            <div class="text-left font-medium text-yellou-500">
                                            {{$m->estado}}
                                            </div>
                                        </td>
                                    @endif

                                    <td class="p-2">
                                        <div class="font-medium text-gray-800">
                                        {{$m->nro_mesa}}
                                        </div>
                                    </td>

                                </tr>
                                </tbody>

                            </table>
                            </div>
                            @endforeach

                        </select>
                        </div>
                    </div>
                    <br>

                </div>

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
