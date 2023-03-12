@extends('navegador')

@section('Contenido')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <form action="{{ Route('Pedido.storexd') }}" method="POST">
        @csrf
        <div class="flex justify-between pl-3 mb-3">
                <div class="">
                    @can('Pedidos.bitacora')
                    <a class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                        href="{{ Route('Pedido.bitacora') }}">Bitacora</a>
                     @endcan
               </div>


                @can('Pedidos.consulta')
                <div>
                    <a class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                        href="{{ Route('Pedido.consultar') }}">Consultar pedido</a>
                 </div>
                @endcan
                <div>
                    <label class="text-black dark:text-gray-300"> Empleado:</label>
                </div>

                <div>
                    <input class="text-black bg-sky-200" type="text" name="empleado" readonly value="{{ $empleado->ci }}">
                </div>

                    <div class="inline-block relative">
                        @if (session('SelectMesa'))
                            <label class="text-red-500"> <b>*{{ session('SelectMesa') }}</b> </label>
                        @endif

                            @can('Pedidos.admin.mesa')
                                <label class="text-gray-500 dark:text-gray-300" for="">Seleccion el Nro Mesa:</label>
                                <select name="mesa" id="" class="bg-gray-900 text-white w-14 h-7 rounded-md">
                                @foreach ($mesasAdmin as $m)
                                    <option class="bg-gray-900 text-white" value="{{ $m->nro_mesa }}">{{ $m->nro_mesa }}
                                    </option>
                                @endforeach
                            @endcan
                            @can('Pedidos.mesero.mesa')
                                <label class="text-gray-500 dark:text-gray-300" for="">Seleccion el Nro Mesa:</label>
                                <select name="mesa" id="" class="bg-gray-900 text-white w-14 h-7 rounded-md">
                                @foreach ($mesas as $m)
                                    <option class="bg-gray-900 text-white" value="{{ $m->nro_mesa }}">{{ $m->nro_mesa }}
                                    </option>
                                @endforeach

                            @endcan

                        </select>
                    </div>

                <div class=" ml-10 space-x-8">
                    <!--  <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                                                   poner reporte
                                                                    </button>-->
                @can('Pedidos.realizar.pedido')
                    <button type="submit"
                        class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                        Realizar pedido
                    </button>
                @endcan
                </div>

            </div>
        </form>
        {{-- <div>
        @include('VistasPedido.ModelListaMesas')
    </div> --}}




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

                                    {{-- <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        EDITAR
                                    </th> --}}
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        ESTADO DEL PEDIDO
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($pedidos as $p)
                                    @if ($p->estado == 'Realizar Pago' )
                                    @can('Pedidos.pagar')
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
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $p->precio_total }}</p>
                                            </td>


                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                @include('VistasPedido.verDetalles')
                                            </td>


                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                <button type="button"
                                                    class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                    <a href="{{ Route('Pedido.editarPedido', $p->id_pedido) }}">
                                                        Editar
                                                    </a></butto>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                <button onclick="openModal(true)"
                                                    class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                    {{ $p->estado }}
                                                </button>
                                            </td>

                                           @include('VistasPedido.ModelRealizarPago')
                                        </tr>
                                        @endcan
                                    @endif


                                    @if ($p->estado == 'En Cocina')
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
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $p->precio_total }}</p>
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
                                                    <a href="{{ Route('Pedido.editarPedido', $p->id_pedido) }}">
                                                        Editar
                                                    </a></butto>
                                            </td>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">

                                                @can('Pedidos.en.cocina')
                                                    {{-- div para odenar los botones! --}}
                                                    <div class="flex ">
                                                        <button
                                                            class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                            {{ $p->estado }}
                                                        </button>


                                                        <form action="{{ Route('Pedido.destroy', $p->id_pedido) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                                                type="submit" onclick="return confirm('Desea Eliminar?')">
                                                                Cancelar
                                                            </button>

                                                        </form>
                                                    </div>
                                                @endcan

                                                @can('Pedidos.listo')
                                                    <form action="{{ Route('Pedido.StoreRealizarPago', $p->id_pedido) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button
                                                            class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                                            type="submit">Pedido Listo!!</button>
                                                    </form>
                                                @endcan

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    @endsection
