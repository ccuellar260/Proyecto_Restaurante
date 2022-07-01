@extends('navegador')

@section('Contenido')
    <form action="{{ Route('Pedido.storexd') }}" method="POST">
        @csrf
        <div class="flex items-center justify-between p-4">
            <label class="text-gray-500 dark:text-gray-300"> Empleado:</label>
            <input class="text-gray-500" type="text" name="empleado" readonly value="{{ $empleado->ci }}">
            <br>
            <label class="text-gray-500 dark:text-gray-300" for="">Seleccion el Nro Mesa:</label>
            <select name="mesa" id="">
                @if (Auth()->user()->id_rol == 1)
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
                                @if ($p->estado == 'Realizar Pago' and Auth()->user()->id_rol != 3)
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
                                            <button onclick="openModal(true)"
                                                class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                {{ $p->estado }}</button>

                                        </td>


                                        <!-- overlay -->
                                        <div id="modal_overlay"
                                            class="hidden absolute inset-60 bg-black bg-opacity-0 h-96 w-3/5 flex justify-center items-center pt-10">

                                            <!-- modal -->
                                            <div id="modal"
                                                class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

                                                <!-- button close -->
                                                <button onclick="openModal(false)"
                                                    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                                                    &cross;
                                                </button>

                                                <!-- header -->
                                                <div class="flex justify-between px-4 py-3 border-b border-gray-200">
                                                    <h3 class="text-xl font-semibold text-gray-600">El cliente esta
                                                        registrado?</h3>
                                                    <button
                                                        class="bg-indigo-600 px-4 py-2 mr-3 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                                        <a href="{{ Route('Cliente.Create') }}">CREAR CLIENTE</a>
                                                    </button>
                                                </div>

                                                <!-- body -->
                                                <div class="w-full p-3">
                                                    <form action="{{ Route('Pedido.storeRecibo', $p->id_pedido) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="flex mt-4 w-full bg-white rounded-lg p-2">
                                                            <label for="cliente"
                                                                class="w-full flex pl-6 self-center text-black font-semibold">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                    fill="currentColor" class="w-6 h-6 self-center">
                                                                    <path
                                                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                                                    </path>
                                                                </svg>
                                                                <span class="pl-4 self-center text-base md:text-xl">
                                                                    Seleccionarun cliente
                                                                </span>
                                                            </label>
                                                            <div class="inline-block relative">
                                                                <select name="cliente" id="cliente"
                                                                    class="
                inline-block
                w-56
                md:w-56
                bg-gray-900
                text-white text-base
                md:text-xl
                font-bold
                h-full
                appearance-none
                px-4
                py-1
                pr-8
                rounded-lg
                shadow
                leading-tight
                outline-none
                focus:outline-none
                focus:shadow-outline
              ">
                                                                    @foreach ($clientes as $c)
                                                                        <option class="bg-gray-900 text-white"
                                                                            value="{{ $c->ci }}">
                                                                            {{ $c->nombre_completo }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div
                                                                    class="
                pointer-events-none
                absolute
                inset-y-0
                right-0
                flex
                items-center
                px-2
                text-white
              ">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="currentColor" stroke="none"
                                                                        viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                                        <path
                                                                            d="M11.178,19.569C11.364,19.839,11.672,20,12,20s0.636-0.161,0.822-0.431l9-13c0.212-0.306,0.236-0.704,0.063-1.033 C21.713,5.207,21.372,5,21,5H3C2.628,5,2.287,5.207,2.114,5.536C1.941,5.865,1.966,6.263,2.178,6.569L11.178,19.569z">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>

                                                <!-- footer -->
                                                <div
                                                    class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                                                    <button
                                                        class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none"
                                                        type="submit">Generar Recibo
                                                    </button>
                                                    </form>

                                                    <button onclick="openModal(false)"
                                                        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none">Close</button>
                                                </div>
                                            </div>

                                        </div>

                                        <script>
                                            const modal_overlay = document.querySelector('#modal_overlay');
                                            const modal = document.querySelector('#modal');

                                            function openModal(value) {
                                                const modalCl = modal.classList
                                                const overlayCl = modal_overlay

                                                if (value) {
                                                    overlayCl.classList.remove('hidden')
                                                    setTimeout(() => {
                                                        modalCl.remove('opacity-0')
                                                        modalCl.remove('-translate-y-full')
                                                        modalCl.remove('scale-150')
                                                    }, 100);
                                                } else {
                                                    modalCl.add('-translate-y-full')
                                                    setTimeout(() => {
                                                        modalCl.add('opacity-0')
                                                        modalCl.add('scale-150')
                                                    }, 100);
                                                    setTimeout(() => overlayCl.classList.add('hidden'), 300);
                                                }
                                            }
                                            openModal(false)
                                        </script>



                                    </tr>
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
                                                <a href="{{ Route('Pedido.editarDetalles', $p->id_pedido) }}">
                                                    Editar
                                                </a></butto>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            @if (Auth()->user()->id_rol != 3)
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button
                                                        class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                                        type="submit">{{ $p->estado }}</button>
                                                </form>
                                            @else
                                                <form action="{{ Route('Pedido.StoreRealizarPago', $p->id_pedido) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button
                                                        class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
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
