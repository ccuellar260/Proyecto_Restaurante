@extends('navegador')

@section('Contenido')


    <div class=" h-full  bg-gradient-to-r from-blue-300 to-indigo-300">
        <div class=" grid grid-cols-12 gap-0">
            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xxl:col-span-8 px-6 py-6">

                <div>
                     <h1>bienvenido {{Auth::user()->nombre_usuario}} a dashboard!!</h1>
                     <h1>bienvenido {{$empleado->nombre_completo}} a dashboard!!</h1>
                </div>


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
                                           Que onda Puto
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





