<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de pedido</title>
</head>
<body>
    <p>Pedidos hecho por ci:{{$pedido->ci_empleado}} </p>
    <p>Mesa Nro: {{$pedido->nro_mesa}}</p>
    <p>Nro de pedido{{$pedido->id_pedido}}</p>
    <table>
        <tr>
              <th>  Nro  -  </th>
              <th>  Producto   -</th>
              <th>  Precio - </th>
              <th>  Cantidad </th>
        </tr>

        @foreach ($detalles as $d)
        <tr>
                <td>{{$d->id_detalle}}</td>
                <td>{{$d->nombre}}  </td>
                <td> {{$d->precio}} </td>
                <td>{{$d->cantidad}}</td>
        </tr>
        @endforeach
    </table>


</body>
</html>
