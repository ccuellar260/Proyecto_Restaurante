<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <h1>Recibo</h1>
    <hr>
    <div class="contenido">
        <p id="primero">NIT EMPRESA</p>
        <input type="text" value="876543456">

        <p id="primero">FACTURA: </p>
        <input type="text" value="876543456">


        <p id="segundo">Green.</p>
        <!-- <p id="tercero">tachado.</p> -->


        <div>
            <div>
                <p class="primero">
                    NIT EMPRESA:
                </p>
                <input type="text" value="876543456" readonly>
            </div>
            <div class="primero">
                <p class="text-gray-600">
                    Factura:
                </p>
                <input type="text" value="{{ $recibo->id_recibo }}" readonly>
            </div>
            <div class="primero">
                <p class="text-gray-600">
                    SR.(ES):
                </p>
                <input type="text" value="{{ $recibo->nombre_completo }}" readonly>
            </div>
            <div class="primero">
                <p class="text-gray-600">
                    NIT:
                </p>
                @if (is_null($recibo->NIT))
                    <input type="number" value="{{ $recibo->NIT }}" readonly>
                @else
                    <input type="text" value="S/N" readonly>
                @endif

            </div>
            <div class="primero">

                <div class="contenido">
                    <div>
                        <div class="">
                            <div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="primero">
                                                CANT. P.UNIT.
                                            </th>
                                            <th class="primero">
                                                DETALLE
                                            </th>

                                            <th class="primero">
                                                SUBTOTAL
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detalles as $mauri)
                                            <tr>
                                                <td>
                                                    <p class="segundo">
                                                        {{ $mauri->cantidad }}X{{ $mauri->prod_precio }} </p>
                                                </td>
                                                <td>
                                                    <p class="segundo">{{ $mauri->nombre }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="primero">{{ $mauri->precio }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>
                                                <p></p>
                                            </td>
                                            <td>
                                                <p class="primero">TOTAL A PAGAR</p>
                                            </td>
                                            <td>
                                                <p class="segundo">
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
        </div>
    </div>
</body>

</html>
