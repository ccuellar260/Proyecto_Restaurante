
    <div x-data="{ modelOpen: false }">
        <button @click="modelOpen =!modelOpen" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            <span>Ver Detalles</span>
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
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                ></div>

                <div x-cloak x-show="modelOpen"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl  p-4 m-52 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                >

                   <div class="flex items-center justify-between space-x-4">
<h2 class="text-xl font-medium text-gray-800 mb-0 p-3">
VER DETALLES DEL PEDIDO #{{ $p->id_pedido }}
</h2>

<button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
</button>
</div>
<div class=" ">
<h class="text-xl font-medium text-gray-800 mb-0 p-3">
Nro_Mesa: {{ $p->nro_mesa }}
</h>
</div>

<div class="overflow-x-auto p-3">
<table class="table-auto w-full">
<thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
<tr>
<th class="p-2">
<div class="font-semibold text-center">Foto</div>
</th>
<th class="p-2">
<div class="font-semibold text-left">Nombre de Producto</div>
</th>
<th class="p-2">
<div class="font-semibold text-left">Cantidad</div>
</th>
<th class="p-2">
<div class="font-semibold text-left">SubTotal</div>
</th>
</tr>
</thead>

@php
$detalles= DB::table('detalle_pedidos as d')
->join('productos as p','d.id_producto','=','p.id_producto')
->where('id_pedido',$p->id_pedido)
->select('d.*','p.nombre','p.url')->get();
@endphp

@foreach ($detalles as $d )
<tbody class="text-sm divide-y divide-gray-100">
<tr>
<td class="p-2">
<div class="flex justify-center">
<img  width="50" src="{{$d->url}}">
</div>
</td>

<td class="p-2">
<div class="font-medium text-gray-800">
{{ucwords($d->nombre)}}
</div>
</td>
<td class="p-2">
<div class="text-left">
{{$d->cantidad}}
</div>
</td>
<td class="p-2">
<div class="text-left font-medium text-green-500">
Bs {{$d->precio}}
</div>
</td>

</tr>


</tbody>
@endforeach

</table>
</div>

<!-- total amount -->
<div class="flex justify-end font-bold space-x-4 text-2xl border-t border-gray-100 px-5 py-1">
<div>Total</div>
<div class="text-blue-600">Bs {{$p->precio_total}}
</div>
</div>


                </div>
            </div>
        </div>
    </div>
</td>
