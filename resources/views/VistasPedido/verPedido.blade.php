@extends('navegador')

@section('Contenido')
    <div class="grid grid-cols-3 py-3 text-center text-gray-500">
        <p>Pedidos hecho por ci: {{ $pedido->ci_empleado }} </p>
        <p>Mesa Nro: {{ $pedido->nro_mesa }}</p>
        <p>Nro de pedido : {{ $pedido->id_pedido }}</p>
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
                                        COD. PRODUCTO
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        PRODUCTO
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        PRECIO UNITARIO
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        CANTIDAD
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalles as $d)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap"> {{ $d->id_producto }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ucwords($d->nombre)}} </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $d->precio }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $d->cantidad }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between p-3">
                <div>
                    <button type=""
                    class="bg-blue-700 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    <a href="{{ Route('Pedido.index') }}">Volver </a>
                </button>
                </div>
                <div>
                    <label for="">Precio Total = </label>
                    <input class="border-solid border-2 border-indigo-600 rounded-lg" type="number" name="cantidad"
                    value="{{$pedido->precio_total}}">
                </div>

            </div>
        </div>
    @endsection
