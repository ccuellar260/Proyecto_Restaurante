@extends('navegador')

@section('Contenido')


    <h1>bien
        vemido a dashboard!!</h1>
        <button> Realizar Peiddos</></button>
        <button> Mesas Disponibles </button>
        <button> Ventas del dia</button>
        <button> Hora de llegada </button>
        <button> Editar Perfil</button>
        <button><a href="{{Route('Pedido',5599876)}}">Ventana Pedidos</a> </button>
        <br>
       <!-- <p> de moemtno usaremos al empleado con el ci:8994432</p> -->


     @yield('dashboard')

@endsection





