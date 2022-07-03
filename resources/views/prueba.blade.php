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
<<<<<<< HEAD
        <input type="number" name="pedido" placeholder="Id de pedido">
        <input type="number" name="mesa" placeholder="Nro mesa">
        <input type="text" name="cliente" placeholder="Cliente">
        <input type="text" name="mesero" placeholder="Ci Empleado">
        <input type="date" name="fecha" placeholder="Fecha">
=======
        <input type="number" name="pedido" placeholder="id de pedido">
        <input type="number" name="mesa" placeholder="nro mesa">
        <input type="number" name="mesero" placeholder="Ci Empleado">
>>>>>>> fe32e685ca59aee0fd6e2347bace21f31456b2c9
        <button type="submit">Buscar</button>
    </form>

    <table>
        <tr>
<<<<<<< HEAD
           <th> Id Pedido - </th>
           <th> Nro Mesa - </th>
           <th> Fecha - </th>
           <th> Ci Mesero - </th>
           <th> Nombre Mesero </th>
           <th> Ci Cliente - </th>
           <th> Nombre Cliente </th>
=======
           <th> Id Pedido</th>
           <th> Nro Mesa</th>
           <th> Ci Mesero</th>
>>>>>>> fe32e685ca59aee0fd6e2347bace21f31456b2c9
        </tr>
        @foreach ($pedidos as $p)
        <tr>
            <td>{{$p->id_pedido}}</td>
            <td>{{$p->nro_mesa}}</td>
<<<<<<< HEAD
            <td>{{$p->fecha}}</td>
            <td>{{$p->ci_empleado}}</td>
            <td>{{$p->empleado}}</td>
            <td>{{$p->ci_cliente}}</td>
            <td>{{$p->cliente}}</td>

        </tr>
            @endforeach

=======
            <td>{{$p->ci_empleado}}</td>
        </tr>
            @endforeach
>>>>>>> fe32e685ca59aee0fd6e2347bace21f31456b2c9
    </table>
</body>
</html>
