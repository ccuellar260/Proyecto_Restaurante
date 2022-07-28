<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>Document</title>
</head>
<body>
  <!-- component -->
<style>
    body {
      background: #e2e8f0;
    }
      *:hover {
        transition: all 150ms ease-in;
      }
    </style>

    <div class="antialiased max-w-6xl mx-auto my-12 bg-gray-300 px-8">

        <form action="{{ Route('Reserva.store') }}" method="post">
            @csrf
      <div class="relative block md:flex items-center">


        {{-- div del cuadrado blanco  --}}
        <div class="w-full md:w-1/2 relative z-1 bg-gray-100 rounded shadow-lg overflow-hidden">
            {{-- div solo para el tiutlo --}}
            <div class="text-lg font-medium text-green-500 uppercase p-8 text-center border-b border-gray-200 tracking-wide">Titulo para div</div>

            {{-- div donde estan los numeros  --}}
          <div class="block sm:flex md:block lg:flex items-center justify-center">
            {{-- <div class="mt-8 sm:m-8 md:m-0 md:mt-8 lg:m-8 text-center"> --}}
              <div class="inline-flex items-center mt-8 sm:m-8 md:m-0 md:mt-8 lg:m-8">
                <label for="fecha" class="mr-4" >
                    Fecha
                </label>
                <input type="date" id="fecha" name="fecha"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block  p-2.5 "
                    placeholder="John" required>
              </div>
          </div>

          <div class="block sm:flex md:block lg:flex items-center justify-center">
            {{-- <div class="mt-8 sm:m-8 md:m-0 md:mt-8 lg:m-8 text-center"> --}}
              <div class="inline-flex items-center mt-8 sm:m-8 md:m-0 md:mt-8 lg:m-8">
                <label for="hora"
                    class="block mb-2 text-sm font-medium mr-4 text-gray-900 dark:text-gray-300">Hora</label>
                <input type="time" id="hora" name="hora"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block  p-2.5 "
                    placeholder="Doe" required>
              </div>
          </div>

          <div class="block sm:flex md:block lg:flex items-center justify-center">
            {{-- <div class="mt-8 sm:m-8 md:m-0 md:mt-8 lg:m-8 text-center"> --}}
              <div class="inline-flex items-center mt-8 sm:m-8 md:m-0 md:mt-8 lg:m-8">
                <label for="ci_cliente"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente</label>
            <select id="ci_cliente" name="ci_cliente"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>

            </select>
              </div>
          </div>

          <div class="grid gap-4 grid-cols-2">
            <div><a class="block flex items-center justify-center bg-gray-200 hover:bg-gray-300 p-8 text-md font-semibold text-gray-800 uppercase mt-16" href="{{ Route('Reserva.index') }}">
                <span>Volver </span>
                <span class="font-medium text-gray-700 ml-2">➔</span>
              </a></div>
            <div><a class="block flex items-center justify-center bg-gray-200 hover:bg-gray-300 p-8 text-md font-semibold text-gray-800 uppercase mt-16" href="{{ Route('Cliente.Create') }}">
                <span>Crar Cliente </span>
                <span class="font-medium text-gray-700 ml-2">➔</span>
              </a></div>
          </div>


        </div>


        {{-- div para el oscuaro  --}}
        <div class="w-full md:w-2/2 relative z-0 px-8 md:px-0 md:py-16">
            <div class="bg-blue-900 text-white rounded-b md:rounded-b-none md:rounded-r shadow-lg overflow-hidden">
              <div class="text-lg font-medium uppercase p-8 text-center border-b border-blue-800 tracking-wide">Registro de Reserva</div>
              <label for="nro_mesa">Nro. de Mesa</label><br>
              <div >



              <a class="block flex items-center justify-center bg-blue-800 hover:bg-blue-700 p-8 text-md font-semibold text-gray-300 uppercase mt-8" href="#" >
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Guardar
                </button>
              </a>
            </div>
          </div>



        </form>



    </div>

</body>
</html>






