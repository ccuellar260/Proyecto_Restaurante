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
        <input type="number" name="pedido" placeholder="Id de pedido">
        <input type="number" name="mesa" placeholder="Nro mesa">
        <input type="text" name="cliente" placeholder="Cliente">
        <input type="text" name="mesero" placeholder="Ci Empleado">
        <input type="date" name="fecha" placeholder="Fecha">
        <button type="submit">Buscar</button>
    </form>

    <table>
        <tr>
           <th> Id Pedido - </th>
           <th> Nro Mesa - </th>
           <th> Fecha - </th>
           <th> Ci Mesero - </th>
           <th> Nombre Mesero </th>
           <th> Ci Cliente - </th>
           <th> Nombre Cliente </th>
        </tr>
        @foreach ($pedidos as $p)
        <tr>
            <td>{{$p->id_pedido}}</td>
            <td>{{$p->nro_mesa}}</td>
            <td>{{$p->fecha}}</td>
            <td>{{$p->ci_empleado}}</td>
            <td>{{$p->empleado}}</td>
            <td>{{$p->ci_cliente}}</td>
            <td>{{$p->cliente}}</td>

        </tr>
            @endforeach

    </table>
</body>
</html>
