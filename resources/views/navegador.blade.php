
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Restaurante</title>
</head>
<body>

  <!-- component -->
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        <div class="lg:flex lg:-mx-2">

            <!-- Para el navegador-->
            <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                 <!-- usando el status solo muestra una edicion-->
                 @if (session('status')) <!--Existe el atributo status?-->
                 <br>   <!-- mostarr lo que esta en status-->
                 {{session('status')}}
             @endif  <br>


                 <!-- metodo para verificar si estamos autentificados-->
                @auth
                <tr>estas logueado</tr>
                @else  <tr>no estas logueado</tr>
                @endauth <br>


                <!-- Botones -->
                @guest  <!--mostrar login por que esta como invitado-->
                    <a href="{{Route('login')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Login</a>
                @else <!-- caso contrario mostrar lo demas botones -->
                     <a href="{{Route('dashboard')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Dasboard</a>
                    <button><a href="">Logout</a></button>
                @endguest


                <a href="{{Route('Rol.index')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Roles</a>
                <a href="{{Route('Empleado.index')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Empleado</a>
                <a href="{{Route('Amb.index')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Gestion de Ambiente</a>
            </div>

            <!-- parte derecha -->
             <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                @yield('Contenido')
            </div>

        </div>
    </div>
</section>


</body>
</html>



