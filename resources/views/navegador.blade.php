<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Mi pagina web</title>
</head>
<body>
    <!-- guest: invitado-->
    @guest  <!--mostrar login por que esta como invitado-->
         <button><a href="{{Route('login')}}">Login</a></button>
    @else <!-- caso contrario mostrar lo demas botones -->
         <button><a href="{{Route('dashboard')}}">Dashboard</a></button>
         <button><a href="">Logout</a></button>

    @endguest

    <button><a href="{{Route('Rol.index')}}">Roles</a></button>
    <button><a href="{{Route('Empleado.index')}}">Empleado</a></button>

    <br>
    @yield('Contenido')
    <!-- tambien podemos usar auth-->
    @auth
    <tr>estas logueado</tr>
    @else  <tr>no estas logueado</tr>
    @endauth

</body>
</html>
