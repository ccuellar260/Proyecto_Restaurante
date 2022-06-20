@extends('navegador')

@section('Contenido')
    <div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
            <div class='max-w-md mx-auto space-y-6'>

                <form action="{{ Route('Mesas.store') }}" method="POST">
                    @csrf
                    <h2 class="text-2xl font-bold ">CREAR MESA</h2>
                    <hr class="my-6">
                    <label for="estado" class="uppercase text-sm font-bold opacity-70">Estado</label>
                    <input type="text"
                        class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"
                        name="estado" id="estado" class="form-control">
                    <label class="uppercase text-sm font-bold opacity-70" for="mesa">Tamaño</label>
                    <select name="mesa"
                        class="w-full p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        @foreach ($tipo as $r)
                            <option value="{{ $r->id_tipo_mesa }}">{{ $r->mesa }}</option>
                        @endforeach
                    </select>
                    <label for="Ubicacion" class="uppercase text-sm font-bold opacity-70">Ubicacion</label>
                    <select name="Ubicacion"
                        class="w-full p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        @foreach ($ambiente as $r)
                            <option value="{{ $r->id_ambiente }}">{{ $r->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="submit"
                        class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300"
                        value="Enviar">
                </form>

            </div>
        </div>
    </div>
@endsection
