@extends('navegador')

@section('Contenido')
    <!-- 1ra fila de opcines los platos, bebidas, postres--> <br>
    <label >REGISTRO DE PEDIDOS</label>
    <Button>Cancelar Pedido</Button>  <br>
    <!--
    <label> Empleado: </label>
    <input type="text"
           readonly
           value="$empleado->users"> <br>

        <label> Nro Mesa: </label>
        <input type="text" value="$mesa->nro_mesa"  readonly> <br>



    -->

        <label > Seleccionar los platos que pedira: </label>

        <table>
            @foreach ($platos as $p )
            <form action="{{Route('Pedido.storeDetalles')}}"
                method="POST">
                @csrf
                <th> {{$p->nombre}}
                <input type="number" name="cantidad" value="0"
                max="9" min="0">
                <input type="hidden" name="producto"
                       value="{{$p->id_producto}}">
                <input type="hidden" name="pedido"
                       value="{{$pedido->id_pedido}}">
                <input type="submit" name="" value="Pedir">

               </form>
            @endforeach
        </table>


        <table>
            @foreach ($bebidas as $b )
            <form action=""
                method="POST">
                @csrf
                <th> {{$b->nombre}}
                <input type="number" name="cantidad" value="0"
                max="9" min="0">
                <input type="submit" name="{{$b->id_producto}}" value="Pedir"
                 >

            </form>
            @endforeach
        </table>


        <table>
            @foreach ($postres as $po )
            <form action=""
                method="POST">
                @csrf
                <th> {{$po->nombre}}
                <input type="number" name="cantidad" value="0"
                max="9" min="0">
                <input type="submit" name="{{$po->id_producto}}" value="Pedir"
                 >

            </form>
            @endforeach
        </table>






@endsection
