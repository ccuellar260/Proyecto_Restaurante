@extends('navegador')

@section('Contenido')



    <h1>bien  vemido {{Auth::user()->nombre_usuario}} a dashboard!!</h1>


        <button> Realizar Peiddos</></button>
        <button> Mesas Disponibles </button>
        <button> Ventas del dia</button>
        <button> Hora de llegada </button>
        <button> Editar Perfil</button>


        <button><a href="{{Route('Pedido',8994432)}}">Ventana Pedidos</a> </button>
        <p>//De momento solo funciona la venta de pedidos</p>
        <p>//la id del empleado con la que se quiere trabajar se la pone manual vista dashboard, aun no se sacar la id de AUTH xd</p>
        <br>
       <!-- <p> de moemtno usaremos al empleado con el ci:8994432</p> -->


     <!-- yield('dashboard') -->

@endsection





