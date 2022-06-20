@extends('navegador')

@section('Contenido')

            <h1">ASIGNAR MESA</h1>
            <form action="{{Route('Empleado.StoreAsignarMesa',$empleado->ci)}}" method="POST">
                @csrf
                <div >
                    <label >
                        Nombre completo:
                    </label>
                    <input type="text" name="nombre_completo" value='{{ $empleado->nombre_completo }}' id="nombre_completo"
                        placeholder=""
                       />

                    <p>mostrar mesa disponible para empelado, los que son igual a null</p>
                    <select name="mesa">
                        @foreach ($mesas as $m)
                            <option  value="{{$m->nro_mesa}}">{{$m->nro_mesa}}</option>

                        @endforeach
                    </select>
                    <button type="submit">Guardar</button>
                </div>





            </form>

@endsection
