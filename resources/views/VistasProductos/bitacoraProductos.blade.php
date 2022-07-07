@extends('navegador')

@section('Contenido')
    {{-- Realizar un buscador --}}
<div class="bg-white p-2 rounded-md w-full">
    <h3>BITACORA PRODUCTO</h3>
    <form action="" method="GET">
        <div class="flex items-center ">
            {{-- <div class="py-4 pl-2">
                <label for="fecha">ID</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="usinginteger" placeholder="ID" name="id">
            </div> --}}
            <div class="py-4 pl-2">
                <label for="fecha">USURARIO</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" placeholder="Usuario" name="user">
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">ACCION</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" placeholder="Accion" name="accion">
            </div>
            <div class="py-4 pl-2 ">
                <label for="fecha">FECHA</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="date" placeholder="fecha" name="fecha">
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">HORA</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="time" placeholder="hora" name="hora" >
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">ID PRODUCTO</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="unsignedTnteger" placeholder="id_producto" name="id_producto" >
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">NOMBRE</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" placeholder="nombre producto" name="nombre_completo" >
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">DESCRIPCION</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" placeholder="descripcion" name="descripcion" >
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">PRECIO</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="decimal" placeholder="precio" name="precio" >
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">CANTIDAD ACTUALIZADA</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="integer" placeholder="cantidad actualizada" name="camtidadActualizar" >
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">URL</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" placeholder="url" name="url" >
            </div>
            <div class="py-4 pl-2">
                <label for="fecha">ID TIPO PLATO</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="unsignedInteger" placeholder="id TIPO PLATO" name="id_tipo_plato" >
            </div>
            <div class="pl-2">
                <button class="btn-outline-primary" type="submit" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
          </div>
    </form>

         <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <h3 class="text-center py-2 font-bold">HISTORIAL DE TODOS LOS PRODUCTOS</h3>
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-1 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th
                                        class="px-1 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        USUARIO
                                    </th>
                                    <th
                                        class="px-1 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        ACCION
                                    </th>
                                    <th
                                        class="px-7 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        FECHA
                                    </th>
                                    <th
                                        class="px-7 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        HORA
                                    </th>

                                    <th
                                        class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        ID PRODUCTO
                                    </th>
                                    <th
                                        class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        NOMBRE
                                    </th>
                                    <th
                                        class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        DESCRIPCION
                                    </th>
                                    <th
                                        class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        PRECIO
                                    </th>
                                    <th
                                        class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        CANTIDAD ACTUALIZADA
                                    </th>
                                    <th
                                        class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        URL
                                    </th>
                                    <th
                                        class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        ID TIPO PLATO
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($producto as $p)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap"> {{ $p->id }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->user }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->accion }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->fecha }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->hora }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->id_producto }}</p>

                                        </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->nombre }}</p>

                                        </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->descripcion }}</p>
                                        </td>

                                        </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->precio }}</p>
                                        </td>

                                        </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->cantidadActualizar }}</p>
                                        </td>

                                        </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->url }}</p>
                                        </td>

                                        </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $p->id_tipo_plato }}</p>
                                        </td>

                                        {{-- <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            <button type="button"
                                                class="mr-3 text-sm text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">

                                                <p class="text-gray-900 whitespace-no-wrap mr-3">
                                                        <a href="{{ Route('Pedido.mostrarDetalles', $p->id_pedido) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg></a>
                                                </p>
                                            <button

                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

</div>


@endsection
