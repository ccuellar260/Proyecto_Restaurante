@extends('navegador')

@section('Contenido')

    <h1>Edicion Pedido {{$pedido->id_pedido}}</h1>

    <button>
        <a href="">
                Adicionar Pedido
        </a>
    </button>

    <table>
        <tr>
            <th>  id -  </th>
            <th> Producto   -</th>
            <th>  Precio- </th>
            <th>Cantidad -</th>

        </tr>

        @foreach ($detalles as $d)
        <tr>
            <td>{{$d->id_producto}}</td>
            <td>{{$d->nombre}}  </td>
            <td> ---- </td>
            <td>
                <form action="">
                    <input type="number"
                           name="cantidad"
                           min="0" max="9"
                           value="{{$d->cantidad}}">
                    <input type="hidden" name="id_detalle"
                    value="{{$d->id_detalle}}">
                    <button type="submit">Guardar</button>
                </form>
            </td>
            <td>
                <button> Eliminar </button>
            </td>
        </tr>
        @endforeach

    </table>

@endsection
