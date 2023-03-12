
@extends('navegador')

@section('Contenido')
{{-- <link rel="stylesheet" href="{{ asset('css/desabilitarInputNumber.css') }}" /> --}}

    <form action="#" method="POST">
        @csrf
        @method('POST')
        <div class=" w-full"> <!--container max-w-lg-->

            <div class="py-4 px-6 max-w-full m-5 bg-white rounded-xl "> <!--container max-w-lg -->
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight ">
                    REALIZAR UNA VENTA
                </h1>
                <p class=" text-gray-500 font-bold mt-2 " for="">Empleado: zdx </p>
                <input type="number" name="ci_empleado" id="" value="" hidden>


                <label for="ci_autocomplete" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">
                    Numero de Carnet:
                </label>

                <div class="relative mt-0 mb-1">
                    <div class="absolute text-gray-600 flex items-center px-4 border-r h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <rect x="3" y="5" width="18" height="14" rx="3" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                            <line x1="7" y1="15" x2="7.01" y2="15" />
                            <line x1="11" y1="15" x2="13" y2="15" />
                        </svg>
                    </div>
                    <input
                        class="text-gray-500 focus:outline-none focus:border focus:border-blue-900  font-normal w-full h-8 flex items-center pl-16  text-sm border-gray-300 rounded border"
                        id="ci_autocomplete" name="ci_cliente" type="number" autofocus="true" />
                </div>


                <label for="cliente" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">
                    Nombre del Cliente:
                </label>
                <input id="cliente"
                    class="mt-0 mb-1 text-gray-600 focus:outline-none focus:border focus:border-blue-900 font-normal w-full h-8 flex items-center pl-3 text-sm border-gray-300 rounded border"
                    name="cliente" type="text" />


                <label for="telefono"
                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Telefono:</label>
                <input id="telefono"
                    class="mt-0 mb-1 text-gray-600 focus:outline-none focus:border focus:border-blue-900 font-normal w-full h-8 flex items-center pl-3 text-sm border-gray-300 rounded border"
                    name="telefono" type="number" />

                <label for="empresa" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Empresa:</label>
                <input id="empresa"
                    class="mt-0 mb-1 text-gray-600 focus:outline-none focus:border focus:border-blue-900 font-normal w-full h-8 flex items-center pl-3 text-sm border-gray-300 rounded border"
                    name="empresa" type="text" />

                <label for="nit" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nit de la
                    Empresa:
                </label>
                <input id="nit"
                    class="mt-0 mb-1 text-gray-600 focus:outline-none focus:border focus:border-blue-900 font-normal w-full h-8 flex items-center pl-3 text-sm border-gray-300 rounded border"
                    name="nit" type="number" />

            </div>
        </div>


        <div class=" max-w-full mt-5 mx-5 rounded-lg  bg-white shadow-lg border border-black ">


            <div class="overflow-x-auto w-full rounded-t-lg bg-white">
                <table class="table-fixed ">
                    <thead class="text-xs  font-semibold uppercase text-gray-600 bg-gray-300">
                        <tr>

                            <th class="p-2">
                                <div class="font-semibold text-left">Nro item</div>
                            </th>
                            <th class="p-2 text-center">
                                <div class="font-semibold text-left">Cod OEM</div>
                            </th>
                            <th class="px-8">
                                <div class="font-semibold text-left">Detalles</div>
                            </th>
                            <th class="">
                                <div class="font-semibold text-center">Cantidad</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Precio</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Sub Total</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Eliminar</div>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="tabla" class="text-base  "> <!--divide-y divide-gray-100 lex-->
                        <tr class="trtr" id="tr1">
                            <td class="border border-black  w-16  lg:w-20 " >
                                <p class=" text-center font-medium text-green-500 "
                                id="item1">  1 </p>
                            </td>
                            <td class="border border-black">
                                <input type="text" class=" text-center font-medium text-green-500 w-16 lg:w-full h-full py-1 " name="cod_oem[]"
                                    placeholder="buscar...'" id="cod_oem1" autocomplete="off" >
                            </td>
                            <td class="border border-black">
                                <input type="text" class=" text-left font-medium text-black w-52 lg:w-96 h-full p-1 text-xs "  name="detalles[]"
                                    placeholder="Detalle" id="detalles1" autocomplete="off" >
                            </td>

                            <td class="border border-black">
                                <div class="flex  justify-center  w-full h-full">
                                    <button id="button_restar1" >
                                        <svg class="w-4 h-4 text-gray-800 "
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </button>




                                    <input type="number" class="  text-center font-medium w-6 pr-1 text-black " name="cantidad[]"
                                    id="cantidad1" value="1" min="1">

                                    <button id="button_sumar1" class="" >
                                            <svg class="w-4 h-4 text-gray-800 "
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" >
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </button>



                                </div>

                            </td>

                            <td class="border border-black">
                                <input class=" text-center font-medium text-black w-full h-full p-1" name="precio[]" id="precio1"
                                value="{{00}}" type="number" min="0">
                            </td>
                            <td class="border border-black">
                                <input class=" text-center  font-medium text-black w-full h-full p-1" name="subtotal[]" id="subtotal1"
                                value="{{00}}" type="number" readonly min="0">
                            </td>

                            {{-- botono de elimniar --}}
                            <td class="border border-black  ">
                                {{-- <div class="flex justify-center"> --}}
                                    <button id="button_eliminar1" class=" font-medium text-black   pl-2 ">
                                        <svg class="w-6 h-6 text-black  hover:text-white rounded-full hover:bg-red-500 "
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>

                            </td>
                        </tr>


                </table>
            </div>




            <div class="flex justify-between pt-1">
                    <div class="flex-initial ml-1 ">
                        <button type="submit"  id="button_adicionar"
                            class="flex items-center px-1 py-2 font-medium tracking-wide text-white capitalize   hover:text-green-900  focus:outline-none transition duration-300 transform active:scale-95 ease-in-out text-sm  ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class=" text-sm ml-1 text-green-700">Adicionar</span>
                        </button>

                    </div>



                <div class=" m-2 mr-5 ">
                        <label class="font-semibold text-sm text-black  ">Monto total:</label>
                        <input class="w-12 bg-white text-black text-center border border-gray-400" type="number" name="monto_total" id="monto_total"
                        value="0" readonly>

                        <label class="text-black ">Bs</label>

                </div>
            </div>

            <div class="flex justify-end m-1 mr-6">
                <label class="text-black" for="">Descuento:
                    <input class="h-6 w-12  text-center border border-gray-400" type="number" value="0">
                %
                </label>
            </div>

            <div class="flex justify-end m-1 mr-5">
                <label class="text-black" for="">Monto Total
                    <input class="h-6 w-12  text-center border border-gray-400" type="number" value="0">
                Bs
                </label>
            </div>

                <div class="flex flex-row-reverse py-2   rounded-b-lg">
                    <div class="flex-initial pr-2">
                        <button type="submit"
                            class="flex items-center px-2 py-2 font-medium tracking-wide text-white capitalize  bg-gray-700 rounded-md hover:bg-gray-500   focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out text-sm  ml-4 ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                fill="#FFFFFF">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path
                                    d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z"
                                    opacity=".3"></path>
                                <path
                                    d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z">
                                </path>
                            </svg>
                            <span class="pl-2 mx-1">Guardar</span>
                        </button>
                    </div>
                    <div class="flex-initial">
                        <button type="button"
                            class="flex items-center px-2 py-2 font-medium tracking-wide text-red-700 capitalize border-4 border-red-600 rounded-md hover:bg-red-500 hover:fill-current hover:text-white  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out text-base h-10">
                            <span class="">Cancelar</span>
                        </button>
                    </div>
                </div>



        </div>
    </form>
{{--
    <script src="{{ asset('js/Autocompletes/cliente_ventas.js') }}"></script>

    <script src="{{ asset('js/Autocompletes/adicionarProducto.js')}}"></script> --}}



@endsection
