<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
        <input type="number" name="pedido" placeholder="id de pedido">
        <input type="number" name="mesa" placeholder="nro mesa">
        <input type="number" name="mesero" placeholder="Ci Empleado">
        <button type="submit">Buscar</button>
    </form>

    <table>
        <tr>
           <th> Id Pedido</th>
           <th> Nro Mesa</th>
           <th> Ci Mesero</th>
        </tr>
        @foreach ($pedidos as $p)
        <tr>
            <td>{{$p->id_pedido}}</td>
            <td>{{$p->nro_mesa}}</td>
            <td>{{$p->ci_empleado}}</td>
        </tr>
            @endforeach
    </table>
</body>
</html>
