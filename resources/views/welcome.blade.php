@extends('navegador')

@section('Contenido')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <form
      class="formulario_reserva"
      action="{{ Route('Reserva.store') }}"
      method="post"
    >
      @csrf
      <h1 class="reserva_titulo">REGISTRO DE RESERVA</h1>
      <div class="container_reserva">
        <div class="container_reserva_datos">
          <label class="reserva_subtitulos" for="fecha">Fecha</label>
          <input
            class="reserva_campos"
            type="date"
            id="fecha"
            name="fecha"
            placeholder="John"
            required
          />
          <label class="reserva_subtitulos" for="hora">Hora</label>
          <input
            class="reserva_campos"
            type="time"
            id="hora"
            name="hora"
            placeholder="Doe"
            required
          />
          <label class="reserva_subtitulos" for="ci_cliente">Cliente</label>
          <select
            class="reserva_campos"
            id="ci_cliente"
            name="ci_cliente"
            required
          >
            @foreach ($clientes as $cliente)
            <option value="{{ $cliente->ci }}">
              {{ ucwords($cliente->nombre_completo) }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="ficha">
          @foreach ($mesas as $m)
          <table>
            <tr class="reserva_mesa">
              <td>
                @if ($m->estado == 'Disponible')
                <input
                  type="radio"
                  name="mesa"
                  id=""
                  value="{{ $m->nro_mesa }}"
                />
                @else
                <input
                  type="radio"
                  name="mesa"
                  id=""
                  value="{{ $m->nro_mesa }}"
                  disabled
                />
                @endif
              </td>
              <td>
                <img
                  width="50"
                  src="https://cdn-icons-png.flaticon.com/512/1535/1535032.png"
                />
              </td>
              <td>
                <div>{{$m->nro_mesa}}</div>
              </td>
              @if ($m->estado == 'Disponible')
              <td>
                <div>{{$m->estado}}</div>
              </td>
              @endif @if ($m->estado == 'Ocupado')
              <td>
                <div>{{$m->estado}}</div>
              </td>
              @endif @if ($m->estado == 'Reserva')
              <td>
                <div>{{$m->estado}}</div>
              </td>
              <td>
                {{-- @php $datos = DB::table('reservas')
                    ->join('clientes','reservas.ci_cliente','=','clientes.ci')
                    ->where('nro_mesa',$m->nro_mesa)->first();
                    //dd($datos);
                 @endphp
                <p>{{$datos->hora_reserva}}</p>
                <p>{{$datos->fecha_reserva}}</p>
                <p>{{ucwords($datos->nombre_completo)}}</p>
              </td> --}}

              @endif
            </tr>
          </table>
          @endforeach
        </div>
      </div>
      <div class="botones">
        <button class="boton">
            <a href="{{ Route('Reserva.index') }}">Volver <span>➔</span></a>
        </button>
        <button class="boton">
            <a href="{{ Route('Cliente.Create') }}">Crear cliente <span>➔</span></a>
        </button>
        <button class="boton">
            Guardar
        </button>
      </div>
    </form>
  </body>
</html>

@endsection
