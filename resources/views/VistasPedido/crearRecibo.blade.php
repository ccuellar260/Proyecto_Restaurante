@extends('navegador')

@section('Contenido')

 <h1>Pedir Ci</h1>
 {{-- falta hacer la busqueda de ci --}}
 <a href="{{Route('Cliente.Create')}}">Crear Cliente</a>

 <form action="{{Route('Pedido.storeRecibo',$p->id_pedido)}}" method="POST">
    @csrf
        {{-- mostrar todos los clientes --}}
        <label for="cliente">Clientes: </label>
    <select name="cliente" id="cliente">

        @foreach ($clientes as $c )
            <option value="{{$c->ci}}">{{$c->nombre_completo}}</option>
        @endforeach

    </select> <br>
    <button type="submit">Generar Recibo</button>
 </form>

 <table>
    <tr>
        <th>CANT. P.UNIT.</th>
        <th>DETALLE</th>
        <th>SUBTOTAL</th>
    </tr>
    @foreach ($detalles as $mauri)
    <tr>
            <td>{{$mauri->cantidad}}X{{$mauri->prod_precio}}</td>
            <td>{{$mauri->nombre}}</td>
            <td>{{$mauri->precio}}</td>
    </tr>
    @endforeach
    <tr>
        <td></td>
        <td>Total a Pagar: Bs</td>
        <td> {{$p->precio_total}}</td>
    </tr>
 </table>
@endsection
