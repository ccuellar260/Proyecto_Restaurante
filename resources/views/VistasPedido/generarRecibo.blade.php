@extends('navegador')

@section('Contenido')
     <label>NIT EMPRESA: </label>
     <input type="number" value="876543456" readonly> <br>

     <label>Factura: </label>
     <input type="number" value="{{$recibo->id_recibo}}" readonly> <br>

     <label>SR.(ES): </label>
     <input type="text" value="{{$recibo->nombre_completo}}" readonly> <br>

     <label>NIT: </label>
     @if (is_null($recibo->NIT))
        <input type="number" value="{{$recibo->NIT}}" readonly> <br>
     @else
        <input type="text" value="S/N" readonly> <br>
     @endif

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
            <td> {{$recibo->precio_total}}</td>
        </tr>
     </table>
     <button><a href=""></a></button>
@endsection
