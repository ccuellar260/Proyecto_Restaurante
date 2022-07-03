@extends('navegador')
@section('Imagen')
{{$empleado->foto}}
@endsection

@section('nombre')
{{$empleado->nombre_completo}}
@endsection

@section('Contenido')


    <div class=" h-full  bg-gradient-to-r from-blue-300 to-indigo-300">


        <div class=" grid grid-cols-12 gap-0">
            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xxl:col-span-8 px-6 py-6">

                <div>
                     <h1>bienvenido {{Auth::user()->nombre_usuario}} a dashboard!!</h1>
                     <h1>bienvenido {{$empleado->nombre_completo}} a dashboard!!</h1>
                </div>
                @if (Auth()->user()->id_rol == 1)

                @else
                @php
                        $marcado = DB::table('marcar_turnos')
                            ->where('id_empleado', $empleado->ci)
                            ->where('fecha', date('Y-m-d'))
                            ->where('marcar_salida', null)
                            ->first();
                    @endphp

                    @if (is_null($marcado))
                        <div>
                            <form action="{{ route('marcarEntrada') }}" method="POST">
                                @csrf
                                <input type="hidden" name="empleado_id" value="{{ $empleado->ci }}">
                                <input type="hidden" name="tipo" value="entrada">
                                <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="hora" value="{{ date('H:i:s') }}">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    marcar horario de entrada
                                </button>
                            </form>

                        </div>
                    @endif


                    <div>


                        @if (is_null($marcado))
                        @else
                            <label for="">Usted Marco su entrada a las: {{ $marcado->marcar_entrada }}</label>
                            <form action="{{ route('marcarSalida', $marcado->id_turno) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    marcar horario de salida
                                </button>
                        @endif
                    </div>

                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Fecha Actual </th>
                                    <th>Hora de Entrada</th>
                                    <th>Hora de Salida</th>
                                    <th>Turno</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marcaciones as $m)
                                    @if ($m->fecha == date('Y-m-d'))
                                        <tr>
                                            <td>{{ $m->fecha }}</td>
                                            <td>{{ $m->marcar_entrada }}</td>
                                            <td>{{ $m->marcar_salida }}</td>
                                            <td>{{ $turno->descripcion }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
            <!-- parte derecah-->
            <div class=" col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xxl:col-span-4 px-6 py-6">
                <!-- Start profile Card -->


                <div class="bg-white rounded-xl p-4 shadow-xl">
                    <div class=" flex flex-col justify-center items-center">
                        <div class="w-32 h-32 rounded-full bg-gray-300 border-2 border-white mt-2">
                            <img
                            src="{{$empleado->foto}}"
                            class="rounded-full w-auto"
                            />
                        </div>
                        <p class="font-semibold text-xl mt-1">{{$empleado->nombre_completo}}  </p>
                        <p class="font-semibold text-base text-gray-400">{{$rol->nombre}}</p>

                        <div class="relative  p-4 rounded-lg shadow-xl w-full bg-cover bg-center h-32 mt-4"
                            style="background-image: url('https://images.pexels.com/photos/1072179/pexels-photo-1072179.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');"
                        >
                            <div class="absolute inset-0 bg-gray-800        bg-opacity-50">
                            </div>
                                <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                                    <div>
                                        <h3 class="text-center text-white text-lg">
                                           Puntos Ganados
                                        </h3>
                                        <h3 class="text-center text-white text-3xl mt-2 font-bold">
                                             2000.00
                                        </h3>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection





