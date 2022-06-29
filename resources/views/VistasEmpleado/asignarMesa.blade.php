@extends('navegador')

@section('Contenido')

            <h1>ASIGNAR MESA</h1>
            <form action="{{Route('Empleado.StoreAsignarMesa',$empleado->ci)}}" method="POST">
                @csrf
                <input type="hidden" name="nombre_completo" value='{{ $empleado->nombre_completo }}' id="nombre_completo"
                        placeholder="">
                <div>
                    {{-- <p>mostrar mesa disponible para empelado, los que son igual a null</p> --}}
                    <br>
                    <label for="mesa">Nro. de Mesas Disponibles</label><br>
                            @foreach ($mesas as $m)
                                <input type="checkbox" name="mesa[]" value="{{ $m->nro_mesa }}">
                                <td>{{ $m->nro_mesa }}</td><br>
                            @endforeach



                    <button type="submit">Guardar</button>
                </div>
            </form>

@endsection
