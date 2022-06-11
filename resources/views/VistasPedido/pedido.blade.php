@extends('dashboard')

@section('dashboard')

   <!-- mostrr solo pedidos disponibles -->
   <p>loguin con ci: {{$empleado->ci}}</p>
   <p>mostrr solo pedidos disponibles </p>
   <p>de moemtno esta mostarn todos los pedidos</p>


   <form action="{{Route('Pedidos.StorePedido')}}"
        method="POST">
        @csrf
        <label > Empleado:</label>
        <input type="text"
                name= "empleado"
                readonly
                value="{{$empleado->ci}}"> <br>

        <label for="">Seleccion el Nro Mesa:</label>
        <select name="mesa" id="">
            @foreach ($mesas as $m )
                <option value="{{$m->nro_mesa}}">{{$m->nro_mesa}}</option>
            @endforeach
        </select> <td>--mostrar solo mesas disponibles</td> <br>

        <button type="submit">Realizar Pedido</button>

   </form>


      <table>
            <tr>
                  <th>  Nro de Pedido  -  </th>
                  <th> Nro de Mesa   -</th>
                  <th>  Ci de Mesero - </th>
                  <th>  Detalles </th>
            </tr>

            @foreach ($pedidos as $p)
            <tr>
                    <td>{{$p->id_pedido}}</td>
                    <td>{{$p->nro_mesa}}</td>
                    <td>{{$p->ci_empleado}}</td>
                    <td>
                        <button>
                            <a href="{{Route('Pedido.smostrarDetalles',
                                      $p->id_pedido)}}">
                                      Ver Detalles
                            </a>
                        </button>
                    </td>
            </tr>
            @endforeach
      </table>




@endsection
