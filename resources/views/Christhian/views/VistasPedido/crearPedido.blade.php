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



                        <p class="text-gray-500 dark:text-gray-300">
                            <form action="{{Route('Pedido.destroy',$pedido)}}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <input
                            class="border border-gray-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-800 focus:bg-gray-700
                            focus:outline-none focus:shadow-outline"
                            type="submit"
                            value="Cancelar Pedido"
                            onclick="return confirm('Desea Eliminar?')">
                            </form> <br>
                        </p>


                    </div>
        </div>

            <!-- Div para todas las productos con sus nombre y botones-->
     <h6 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Categorioa Platos:</h6>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @foreach ($platos as $p )
        <form action="{{Route('Pedido.storeDetalles')}}"
            method="POST">
            @csrf
            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                <img class="object-cover w-full rounded-md h-72 xl:h-80"
                src="{{$p->url}}" alt="T-Shirt">
                <h4 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">{{$p->nombre}}</h4>
                <la class="text-blue-500">${{$p->precio}}</la>

                <p >
                    <!-- usando el status solo muestra un mensaje-->
                    @if (session("status{$p->id_producto}")) <!--Existe el atributo status?-->
                      <!-- mostarr lo que esta en status-->
                    {{session("status{$p->id_producto}")}}
                    @else
                         @if ($p->cantidad!= 0)
                            <label class="mt-2 text-lg font-medium text-gray-700
                                    dark:text-gray-200">
                                    Disponible: {{$p->cantidad}}
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
                    name ='cantidad'
                    id="cantidad"
                    min="0", max="9"
                    value="0" >
                </label>





                <input type="hidden" name="fecha"
                value="{{date('Y-m-d')}}">
                <input type="hidden" name="hora"
                value="{{date('H:i:s')}}">
                <input type="hidden" name="precio"
                value="{{$p->precio}}">
                <input type="hidden" name="producto"
                       value="{{$p->id_producto}}">
                <input type="hidden" name="pedido"
                       value="{{$pedido->id_pedido}}">


                <!-- Botton de adicionar al carro-->

                <button class="flex items-center justify-center w-full px-2 py-2
                        mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                        type="submit"
                >
                    <!-- icono para el botuuon-->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
                    <span class="mx-1" > Hacer Pedido </span>
                </button>


            </div>




        </form>
        @endforeach


    </div>




    <!-- Div para todas las productos con sus nombre y botones-->
    <h6 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Categorioa Bebidas:</h6>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @foreach ($bebidas as $b )
        <form action="{{Route('Pedido.storeDetalles')}}"
            method="POST">
            @csrf
            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                <img class="object-cover w-full rounded-md h-72 xl:h-80"
                src="{{$b->url}}" alt="T-Shirt">
                <h4 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">{{$b->nombre}}</h4>
                <la class="text-blue-500">${{$b->precio}}</la>
                <label class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Cantidad:
                <input
                    class="shadow  border rounded  py-1 px-1 text-gray-700 leading-tight focus:outline-none' focus:shadow-outline"
                    type="number"
                    name ='cantidad'
                    min="0", max="9"
                    value="0" >
                </label>

                <input type="hidden" name="producto"
                        value="{{$b->id_producto}}">
                <input type="hidden" name="pedido"
                        value="{{$pedido->id_pedido}}">


                <!-- Botton de adicionar al carro-->
                <button class="flex items-center justify-center w-full px-2 py-2
                        mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                        type="submit"
                >
                    <!-- icono para el botuuon-->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
                    <span class="mx-1" > Hacer Pedido </span>
                </button>

            </div>
        </form>
        @endforeach


    </div>







 <!-- Div para todas las productos con sus nombre y botones-->
      <h6 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Categorioa Bebidas:</h6>
      <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

          @foreach ($postres as $po )
          <form action="{{Route('Pedido.storeDetalles')}}"
              method="POST">
              @csrf
              <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                  <img class="object-cover w-full rounded-md h-72 xl:h-80"
                  src="{{$po->url}}" alt="T-Shirt">
                  <h4 class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">{{$po->nombre}}</h4>
                  <la class="text-blue-500">${{$po->precio}}</la>
                  <label class="mt-2 text-lg font-medium text-gray-700     dark:text-gray-200">Cantidad:
                  <input
                      class="shadow  border rounded  py-1 px-1 text-gray-700 leading-tight focus:outline-none' focus:shadow-outline"
                      type="number"
                      name ='cantidad'
                      min="0", max="9"
                      value="0" >
                  </label>

                  <input type="hidden" name="producto"
                          value="{{$po->id_producto}}">
                  <input type="hidden" name="pedido"
                          value="{{$pedido->id_pedido}}">


                  <!-- Botton de adicionar al carro-->
                  <button class="flex items-center justify-center w-full px-2 py-2
                          mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                          type="submit"
                  >
                      <!-- icono para el botuuon-->
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                      </svg>
                      <span class="mx-1" > Hacer Pedido </span>
                  </button>

              </div>
          </form>
          @endforeach


      </div>




@endsection
