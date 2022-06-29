@extends('navegador')

@section('Contenido')
<form action="{{ Route('Pedido.CrearPedido') }}" method="POST">
        @csrf
        <div class="flex items-center justify-between p-4">
            <label class="text-gray-500 dark:text-gray-300"> Empleado:</label>
            <input class="text-gray-500" type="text" name="empleado" readonly value="{{ $empleado->ci }}">
            <br>
            <label class="text-gray-500 dark:text-gray-300" for="">Seleccion el Nro Mesa:</label>
            <select name="mesa" id="">
                @if ((Auth()->user()->id_rol == 1))
                    @foreach ($mesasAdmin as $m)
                    <option value="{{ $m->nro_mesa }}">{{ $m->nro_mesa }}</option>
                    @endforeach
                @else
                    @foreach ($mesas as $m)
                        <option value="{{ $m->nro_mesa }}">{{ $m->nro_mesa }}</option>
                    @endforeach
                @endif
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

<div class="flex justify-between p-4">
        <button type=""
            class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
            <a href="{{ Route('Pedido.consultar') }}">Consultar pedido</a>
        </button>

        <form action="{{ Route('Pedido.RestCantPlatos') }}" method="POST">
            @method('PUT')
            @csrf
            <button type="submit"
                class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">

                Actializar Platos
            </button>
        </form>
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
                                    ESTADO DEL PEDIDO
                                </th>
                        </tr>
                    </thead>

                        <tbody>

                             @foreach ($pedidos as $p)
                            @if (($p->estado == 'Realizar Pago') and (Auth()->user()->id_rol != 3))
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
                                        <a href="{{ Route('Pedido.editarDetalles', $p->id_pedido) }}">
                                            Editar
                                        </a></butto>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">

                                                        <button class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                        <a href="{{Route('Pedido.crearRecibo',$p->id_pedido)}}">{{$p->estado}}</a></button>

                                    </td>
                                </tr>
                            @endif


                            @if ($p->estado == 'En Cocina' )
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
                                    <a href="{{ Route('Pedido.editarDetalles', $p->id_pedido) }}">
                                        Editar
                                    </a></butto>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    @if (Auth()->user()->id_rol != 3)
                                        <form action=""
                                              method="POST">
                                              @csrf
                                              @method('PUT')
                                              <button class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                              type="submit">{{$p->estado}}</button>
                                        </form>
                                    @else
                                        <form action="{{Route('Pedido.StoreRealizarPago',$p->id_pedido)}}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                            type="submit">Pedido Listo!!</button>
                                    </form>
                                    @endif

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

@endsection
