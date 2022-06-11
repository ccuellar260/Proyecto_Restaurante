@extends('prueba')

@section('Navegador')

<a href="{{Route('login')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Login</a>
<a href="{{Route('dashboard')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Dasboard</a>
<a href="{{Route('Rol.index')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Roles</a>
<a href="{{Route('Empleado.index')}}" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Empleado</a>



@endsection
