@extends('navegador')

@section('Contenido')
     <!-- para el titulo que va arriba de los productos-->
        <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
            <!-- titulo de la inzquierda-->
            <p class="text-gray-500 dark:text-gray-300">
                Empleado: {{$ci}} - Mesa: {{$nro_mesa}}
            </p>
                    <!-- titulo de la derecha -->
                    <div class="flex items-center">


        <form action="{{Route('Pedido.storePedido')}}"
         method="POST">
         @csrf
                        <p class="text-gray-500 dark:text-gray-300">
                        <input
                            class="border border-gray-500 bg-red-500 text-white rounded-md px-4 py-2 m-2
                            transition duration-500 ease select-none hover:bg-red-800 focus:bg-gray-700
                            focus:outline-none focus:shadow-outline"
                            type="submit"
                            value="Guardar Pedido"
                         >
                        </p>

                        <input type="hidden" name="empleado"
                        value="{{$ci}}">
                        <input type="hidden" name="mesa"
                        value="{{$nro_mesa}}">


                    </div>
        </div>

            <!-- Div para todas las productos con sus nombre y botones-->
     <h6 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Categorioa Platos:</h6>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @foreach ($platos as $p )

            @csrf
            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                <img class="object-cover w-full rounded-md h-72 xl:h-80"
                src="{{$p->url}}" alt="T-Shirt">
                <h4 class="mt-2 text-lg font-medium text-gray-700
                            dark:text-gray-200">{{$p->nombre}}</h4>
                <la class="text-blue-500">${{$p->precio}}</la>

                <p >
                    <!-- usando el status solo muestra un mensaje-->
                    @if (session("status{$p->id_producto}")) <!--Existe el atributo status?-->
                      <!-- mostarr lo que esta en status-->
                     {{session("status{$p->id_producto}")}}
                    @else
                         @if ($p->cantidadMomento!= 0)
                            <label class="mt-2 text-lg font-medium text-gray-700
                                    dark:text-gray-200">
                                    Disponible: {{$p->cantidadMomento}}
                            </label>
                        @else
                            <label class="mt-2 text-lg font-medium text-gray-700
                                          dark:text-gray-200">
                            AGOTADO!!
                            </label>
                        @endif
                    @endif
                </p>
                <div class="grid gap-2 grid-col-2">
                <label class="mt-2 text-lg font-medium text-gray-700
                              dark:text-gray-200">
                              Cantidad:

                    <input
                    class="shadow  border rounded  py-1 px-1 text-gray-700
                           leading-tight focus:outline-none' focus:shadow-outline"
                    type="number"
                    name ='cantidad[]'
                    id="cantidad"
                    min="0", max="9"
                    value="0" >
                </label>
            </div>

                <input type="hidden" name="fecha"
                value="{{date('Y-m-d')}}">
                <input type="hidden" name="hora"
                value="{{date('H:i:s')}}">
                <input type="hidden" name="precio[]"
                value="{{$p->precio}}">
                <input type="hidden" name="producto[]"
                       value="{{$p->id_producto}}">



                <!-- Botton de adicionar al carro-->


            </div>

        @endforeach


    </div>






            <!-- Div para todas las productos con sus nombre y botones-->
            <h6 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Categorioa Platos:</h6>
            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($bebidas as $b )

                    @csrf
                    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                        <img class="object-cover w-full rounded-md h-72 xl:h-80"
                        src="{{$b->url}}" alt="T-Shirt">
                        <h4 class="mt-2 text-lg font-medium text-gray-700
                                    dark:text-gray-200">{{$b->nombre}}</h4>
                        <la class="text-blue-500">${{$b->precio}}</la>

                        <p >
                            <!-- usando el status solo muestra un mensaje-->
                            @if (session("status{$b->id_producto}")) <!--Existe el atributo status?-->
                              <!-- mostarr lo que esta en status-->
                            {{session("status{$b->id_producto}")}}
                            @else
                                 @if ($b->cantidadMomento!= 0)
                                    <label class="mt-2 text-lg font-medium text-gray-700
                                            dark:text-gray-200">
                                            Disponible: {{$b->cantidadMomento}}
                                    </label>
                                @else
                                    <label class="mt-2 text-lg font-medium text-gray-700
                                                  dark:text-gray-200">
                                    AGOTADO!!
                                    </label>
                                @endif
                            @endif
                        </p>

                        <label class="mt-2 text-lg font-medium text-gray-700
                                      dark:text-gray-200">
                                      Cantidad:
                            <input
                            class="shadow  border rounded  py-1 px-1 text-gray-700
                                   leading-tight focus:outline-none' focus:shadow-outline"
                            type="number"
                            name ='cantidad[]'
                            id="cantidad"
                            min="0", max="9"
                            value="0" >
                        </label>


                        <input type="hidden" name="fecha"
                        value="{{date('Y-m-d')}}">
                        <input type="hidden" name="hora"
                        value="{{date('H:i:s')}}">
                        <input type="hidden" name="precio[]"
                        value="{{$b->precio}}">
                        <input type="hidden" name="producto[]"
                               value="{{$b->id_producto}}">



                        <!-- Botton de adicionar al carro-->


                    </div>

                @endforeach


            </div>






            <!-- Div para todas las productos con sus nombre y botones-->
            <h6 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Categorioa Platos:</h6>
            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($postres as $po )

                    @csrf
                    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                        <img class="object-cover w-full rounded-md h-72 xl:h-80"
                        src="{{$po->url}}" alt="T-Shirt">
                        <h4 class="mt-2 text-lg font-medium text-gray-700
                                    dark:text-gray-200">{{$po->nombre}}</h4>
                        <la class="text-blue-500">${{$po->precio}}</la>

                        <p >
                            <!-- usando el status solo muestra un mensaje-->
                            @if (session("status{$po->id_producto}")) <!--Existe el atributo status?-->
                              <!-- mostarr lo que esta en status-->
                            {{session("status{$po->id_producto}")}}
                            @else
                                 @if ($po->cantidadMomento!= 0)
                                    <label class="mt-2 text-lg font-medium text-gray-700
                                            dark:text-gray-200">
                                            Disponible: {{$po->cantidadMomento}}
                                    </label>
                                @else
                                    <label class="mt-2 text-lg font-medium text-gray-700
                                                  dark:text-gray-200">
                                    AGOTADO!!
                                    </label>
                                @endif
                            @endif
                        </p>

                        <label class="mt-2 text-lg font-medium text-gray-700
                                      dark:text-gray-200">
                                      Cantidad:
                            <input
                            class="shadow  border rounded  py-1 px-1 text-gray-700
                                   leading-tight focus:outline-none' focus:shadow-outline"
                            type="number"
                            name ='cantidad[]'
                            id="cantidad"
                            min="0", max="9"
                            value="0" >
                        </label>


                        <input type="hidden" name="fecha"
                        value="{{date('Y-m-d')}}">
                        <input type="hidden" name="hora"
                        value="{{date('H:i:s')}}">
                        <input type="hidden" name="precio[]"
                        value="{{$po->precio}}">
                        <input type="hidden" name="producto[]"
                               value="{{$po->id_producto}}">

                        <!-- Botton de adicionar al carro-->
                    </div>
                @endforeach
            </div>
    </form>
@endsection
