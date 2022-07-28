@extends('navegador')

@section('Contenido')

<form action="{{Route('Pedido.updatePedido',$pedido->id_pedido)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-4 py-3 text-center text-gray-500">
        <p>Pedidos hecho por ci: {{ $pedido->ci_empleado }} </p>
        <p>Mesa Nro: {{ $pedido->nro_mesa }}</p>
        <p>Nro de pedido : {{ $pedido->id_pedido }}</p>

        <button type="submit" id="btguardar" class="bg-blue-700 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
            <a href="{{ Route('Pedido.index') }}">GUARDAR</a>
        </button>
         <input type="hidden" name="metodo"
            value="edit">
            <input type="hidden" name="pedido"
            value="{{$pedido->id_pedido}}">
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
                                    FOTO
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
                                    CANTIDAD DISPONIBLE
                                </th>
                                <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                   CANTIDAD
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $p)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <img  width="80" src="{{asset('img/fotosProductos/'.$p->url)}}">
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ucwords($p->nombre)}} </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $p->precio }}</p>
                                    </td>

                                                        <!-- usando el status solo muestra un mensaje-->
                                        @if (session("status{$p->id_producto}"))
                                        <!--Existe el atributo status?-->
                                        <!-- mostarr lo que esta en status-->
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ session("status{$p->id_producto}") }}</p>
                                        </td>
                                        @else
                                            @if ($p->cantidadMomento != 0)
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $p->cantidadMomento}}</p>
                                                </td>
                                            @else
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap">AGOTADO</p>
                                                </td>
                                            @endif
                                        @endif




                                    @php $ban = false; @endphp
                                    @foreach ($detalles as $d)
                                        @if ( $p->id_producto == $d->id_producto)
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                {{-- <p class="text-gray-900 whitespace-no-wrap">{{ $d->cantidad }}</p> --}}
                                            <input class="shadow  border rounded  py-1 px-1 text-gray-700 w-16
                                                    leading-tight focus:outline-none' focus:shadow-outline"
                                                   type="number" name="cantidad[]" value="{{ $d->cantidad }}">
                                            </td>
                                            <input hidden type="number" name="producto[]" value="{{$p->id_producto}}">
                                            @php $ban = true; @endphp
                                            @break
                                          @endif
                                    @endforeach
                                    @if ($ban == false)
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            {{-- <p class="text-gray-900 whitespace-no-wrap">{{ $d->cantidad }}</p> --}}
                                            <input class="shadow  border rounded  py-1 px-1 text-gray-700 w-16
                                                leading-tight focus:outline-none' focus:shadow-outline"
                                                type="number" name="cantidad[]" value="0">
                                        </td>
                                        <input hidden type="number" name="producto[]" value="{{$p->id_producto}}">
                                    @endif

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
                <button type="submit" class="bg-blue-700 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    <a href="{{ Route('Pedido.index') }}">GUARDAR</a>
                </button>
            </div>
            <div>
                <label for="">Precio Total = </label>
                <input class="border-solid border-2 border-indigo-600 rounded-lg" type="number" name="precioTotal"
                value="{{$pedido->precio_total}}">
                <input hidden type="number" name="nro_mesa"
                value="{{$pedido->nro_mesa}}">
            </div>


        </div>
    </div>
</form>
@endsection
