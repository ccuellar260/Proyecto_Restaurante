<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
        <span>MESAS DISPONIBLES</span>
    </button>
    <div x-show="modelOpen" class="fixed flex-col inset-0 z-50 overflow-y-auto " aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end min-h-screen  text-center md:items-center sm:block sm:p-0">

            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
            </div>

            <div x-cloak x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl  p-4 m-52 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                <div class="flex items-center justify-between space-x-4">
                    <h2 class="text-xl font-medium text-gray-800 mb-0 p-3">
                    LISTA DE MESAS DISPONIBLES
                    </h2>
                    {{-- BOTON X PARA CERRAR --}}
                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                         <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <div>
                    {{-- @php
                        dd($mesasAdmin );
                    @endphp --}}

                    @foreach ($mesasAdmin as $m)
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
                            {{-- @elseif ($m->estado == 'Disponible')
                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">
                                    {{$m->estado}}
                                    </div>
                                </td> --}}
                            {{-- @endif --}}

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

                 </div>
            </div>
        </div>
    </div>
</div>

