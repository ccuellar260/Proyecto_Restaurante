@extends('navegador')


@section('Contenido')


<div class="flex justify-between pr-3">
    <div>
    </div>
    <div>
    <button type="submit"
        class="bg-blue-700 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
        <a  href="{{Route('Turno.create')}}">CREAR TURNO </a>
    </button>
    </div>
</div>





<div class="bg-white p-2 rounded-md w-full">
    <div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nro
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Descripción
                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Hora de Entrada
                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Hora de Salida
                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                ACCIONES
                            </th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($turnos as $turno)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap"> {{$turno->id_turno}} </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap">{{$turno->descripcion}}</p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap">{{$turno->hora_entrada}}</p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap">{{$turno->hora_salida}}</p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <div class="flex justify-between">

                                    <button type="button"
                                        class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{Route('Turno.edit',$turno->id_turno)}}">
                                            EDITAR
                                        </a>
                                    </button>

                                        <button type="button"
                                            class="mr-3 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            <form action="{{ Route('Rol.destroy', $turno) }}" method="POST">
                                                @csrf
                                                <!-- token de seguridad-->
                                                @method('DELETE')

                                                <!-- mostar boton eliminar-->
                                                <input type="submit" value="ELIMINAR" class=""
                                                    onclick="return confirm('Desea Eliminar?')">
                                                <!-- volver a preguntar si desea eliminar -->
                                            </form>
                                        </button>
                                    </button>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
