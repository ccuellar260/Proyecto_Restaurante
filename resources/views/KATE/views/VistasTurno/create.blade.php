@extends('navegador')


@section('Contenido')


<div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
        <div class='max-w-md mx-auto space-y-6'>

            <form action="{{Route('Turno.store')}}" method="POST">
                @csrf
                <h2 class="text-2xl font-bold ">CREAMOS EL TURNO</h2>
                <hr class="my-6">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                </div>
                <hr class="my-6">
                <label class="uppercase text-sm font-bold opacity-70">HORA DE ENTRADA</label>
                <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" placeholder="Hora de Entrada">
                <hr class="my-6">
                <label class="uppercase text-sm font-bold opacity-70">HORA DE SALIDA</label>
                <input type="time" class="form-control" id="hora_salida" name="hora_salida" placeholder="Hora de Salida">
                <hr class="my-6">
                <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Crear">
            </form>

        </div>
    </div>
</div>
@endsection
