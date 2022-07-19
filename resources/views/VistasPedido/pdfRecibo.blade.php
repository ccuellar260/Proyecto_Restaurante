<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

</head>
<body>
    <div class="">

        <div class="">
            <div class="">
                <h2 class="">
                    DETALLE DE RECIBO
                </h2>
            </div>
            <div>
                <div class="">
                    <p class="">
                        NIT EMPRESA:
                    </p>
                    <input type="text" value="876543456" readonly>
                </div>
                <div class="">
                    <p class="">
                        Factura:
                    </p>
                    <input type="text" value="{{ $recibo->id_recibo }}" readonly>
                </div>
                <div>
                    <p class="text-gray-600">
                        SR.(ES):
                    </p>
                    <input type="text" value="{{ $recibo->nombre_completo }}" readonly>
                </div>
                <div>
                    <p>
                        NIT:
                    </p>
                    @if (is_null($recibo->NIT))
                        <input type="number" value="{{ $recibo->NIT }}" readonly>
                    @else
                        <input type="text" value="S/N" readonly>
                    @endif

                </div>
                <div class="">

                    <div class="">
                        <div>
                            <div class="">
                                <div class="">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="">
                                                    CANT. P.UNIT.
                                                </th>
                                                <th
                                                    class=">
                                                    DETALLE
                                                </th>

                                                <th
                                                    class="r">
                                                    SUBTOTAL
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($detalles as $mauri)
                                            <tr>
                                                    <td
                                                        class="">
                                                        <p class="">
                                                            {{ $mauri->cantidad }}X{{ $mauri->prod_precio }} </p>
                                                    </td>
                                                    <td
                                                        class="">
                                                        <p class="">{{ $mauri->nombre }}
                                                        </p>
                                                    </td>

                                                    <td
                                                        class="">
                                                        <p class="">{{ $mauri->precio }}
                                                        </p>
                                                    </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="">
                                                    <p class=""></p>
                                                </td>
                                                <td class="">
                                                    <p class="">TOTAL A PAGAR</p>
                                                </td>
                                                <td class="">
                                                    <p class="">
                                                        {{ $recibo->precio_total }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <p class="">
                        Attachments
                    </p>
                    <div class="">
                        <div class="">
                            <div class="">

                            </div>
                            <form action="{{ Route('Pedido.pdf') }}" method="get">
                                @csrf
                                <input type="text" hidden name="recibo" value="{{ $recibo->id_recibo }}">
                                <button type="submit">ver en pdf</button>
                            </form>
                            <!-- <a href="{{ Route('Pedido.pdf') }}" class="text-purple-700 hover:underline">
                                Descargota
                            </a> -->
                        </div>

                        <div class="">
                            <div class="">

                            </div>
                            <a href="#" class="">
                                Download xdasdfsa fsafd
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</body>
</html>
