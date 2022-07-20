@extends('navegador')
@section('Contenido')
<!-- component -->

<div class="flex justify-between pl-3 mb-3">
    <div>
        <a class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
        href="{{ Route('Empleado.bitacora') }}">Bitacora Empleado</a>
    </div>
    <div>
        <a class="bg-blue-700 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
        href="{{ Route('Empleado.create') }}">REGISTRAR UN EMPLEADO</a>
    </div>
</div>

<div class="bg-white p-2 rounded-md w-full">
    <div class="container px-6 py-1 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">Empleados!!!</h1>
        <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($tabla as $fila)
            {{-- div para cad imagen!!! --}}
            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-blue-600 rounded-xl">
                <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300" src="{{asset('img/fotosEmpleados/'.$fila->foto)}}" alt="">

                <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white
                    group-hover:text-white"> {{ ucwords($fila->nombre_completo) }}</h1>

                {{-- <p class="mt-2 text-gray-700 capitalize dark:text-gray-300
                    group-hover:text-gray-300">{{ ucwords($fila->nombre) }}
                </p> --}}
                @php
                    $me ='';
                @endphp
                @foreach ($mesas as $m)
                    @if ($m->ci_empleado == $fila->ci)
                    @php
                            $me = $me.$m->nro_mesa.' - ';
                    @endphp
                    @endif
                @endforeach
                    @php
                        $me = substr($me,0,-2);
                    @endphp
                <p class=" text-gray-500 capitalize dark:text-gray-300
                group-hover:text-gray-300"> {{$me}}
                </p>

                {{-- div para las opcines de abajo!! --}}
                <div class="flex mt-3 -mx-2">
                    <a href="{{ Route('Empleado.edit', $fila->ci) }}" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white" aria-label="Reddit" >
                        <img src="{{ asset('img/editar.png') }}" class="w-6 h-6 fill-current">
                    </a>

                    <form action="{{ Route('Empleado.destroy', $fila->ci) }}" method="POST">
                        @csrf
                        <!-- token de seguridad-->
                        @method('DELETE')

                        <!-- mostar boton eliminar-->
                        <button class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white"
                        aria-label="Facebook"
                        type="submit" class=""
                            onclick="return confirm('Desea Eliminar?')">
                            <img src="{{ asset('img/delete.png') }}"  class="w-6 h-6 fill-current">
                        <!-- volver a preguntar si desea eliminar -->
                        </button>
                    </form>

                    <a href="{{ Route('Empleado.asignarMesa', $fila->ci) }}" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white" aria-label="Github">
                        <img src="{{ asset('img/asignar.png') }}"  class="w-6 h-6 fill-current"">
                    </a>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
