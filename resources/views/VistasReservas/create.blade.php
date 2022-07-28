@extends('navegador')

@section('Contenido')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
  </head>
  <body>
    @if (session('hora_reserva')) <!--Existe el atributo status?-->
          <div class=" max-w-lg bg-red-500 mx-auto mt-3 mb-3 p-2 flex space-x-2">
              <svg class="w-6 h-6 stroke-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <p class="text-white font-semibold">{{session('hora_reserva')}}</p>
          </div>
    @endif
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
                <input class="input_radio"
                  type="radio"
                  name="mesa"
                  id=""
                  value="{{ $m->nro_mesa }}"
                />
                @else
                <input class="input_radio"
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
                <div style="color: green">{{$m->estado}}</div>
              </td>
              @endif @if ($m->estado == 'Ocupado')
              <td>
                <div class="reserve_ocupado" style="color: red">{{$m->estado}}</div>
              </td>
              @endif @if ($m->estado == 'Reserva')
              <td>
                <div class="reserva_erva" style="color: yellow">{{$m->estado}}</div>
              </td>
              <td>
              @php $datos = DB::table('reservas')
                    ->join('clientes','reservas.ci_cliente','=','clientes.ci')
                    ->where('nro_mesa',$m->nro_mesa)->first();
                 @endphp

                 @if (!is_null($datos))

                        <p>{{$datos->hora_reserva}}</p>
                        <p>{{$datos->fecha_reserva}}</p>
                        <p>{{ucwords($datos->nombre_completo)}}</p>

                 @endif

              @endif
              </td>


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
        <button type="submit" class="boton">
            Guardar
        </button>
      </div>
    </form>
  </body>
</html>

@endsection
