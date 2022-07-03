@extends('navegador')

@section('Contenido')

<div class="max-w-2xl mx-auto bg-white p-12">

        <form action="{{ Route('Empleado.StoreAsignarMesa',$empleado) }}" method="post">
            @csrf
            <div>
                <div class="form-group">
                <p class="text-3xl font-bold leading-7 text-center text-white">Registro de Roles</p>
                    <label for="nro_mesa">Nro. de Mesas disponibles</label><br>
                    <br>
                    <div class="grid gap-3 grid-cols-1">
                        @foreach ($mesas as $m)
                                <input type="checkbox" name="mesa[]" value="{{ $m->nro_mesa }}">
                                <td>{{ $m->nro_mesa }}</td><br>
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="grid gap-6 grid-cols-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Guardar
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection


