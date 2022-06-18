@extends('navegador')

@section('Contenido')
    <!-- mostrr solo pedidos disponibles -->


    <form action="{{ Route('Pedidos.StorePedido') }}" method="POST">
        @csrf
        <div class="flex items-center justify-between">
            <label class="text-gray-500 dark:text-gray-300"> Empleado:</label>
            <input class="text-gray-500" type="text" name="empleado" readonly value="{{ $empleado->ci }}">
            <br>
            <label class="text-gray-500 dark:text-gray-300" for="">Seleccion el Nro Mesa:</label>
            <select name="mesa" id="">
                @foreach ($mesas as $m)
                    <option value="{{ $m->nro_mesa }}">{{ $m->nro_mesa }}</option>
                @endforeach
            </select>

            <div class="lg:ml-40 ml-10 space-x-8">
             <!--  <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
               poner reporte
                </button>-->
                <button type="submit"
                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    Realizar pedido
                </button>
            </div>
        </div>

    </form>

    <div class="bg-white p-2 rounded-md w-full">
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    NRO. DE PEDIDO
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    NRO. DE MESA
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    CI. DE MESERO
                                </th>
                                <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                PRECIO TOTAL
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    DETALLES
                                </th>

                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    EDITAR
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    GENERAR RECIBO
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $p)

                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap"> {{ $p->id_pedido }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $p->nro_mesa }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $p->ci_empleado }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $p->precio_total}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <button type="button"
                                            class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            <a href="{{ Route('Pedido.mostrarDetalles', $p->id_pedido) }}">
                                                Ver Detalles
                                            </a></butto>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <button type="button"
                                            class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            <a href="{{ Route('Pedido.editarDetalles',
                                            $p->id_pedido)}}">
                                                  Editar
                                            </a></butto>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <button type="button"
                                        class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ Route('Pedido.RealizarPago',$p->id_pedido)}}">
                                              Realizar Pago
                                        </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                     <!--
                    <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        <span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of 50 Entries
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                            <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
                            &nbsp; &nbsp;
                            <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button>
                        </div>
                    </div>    -->
                </div>
            </div>
        </div>
    </div>
@endsection
