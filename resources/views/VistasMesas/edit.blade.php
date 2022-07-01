@extends('navegador')

@section('Contenido')
    <div class="max-w-2xl mx-auto bg-white p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-center font-bold text-3xl mb-5">GESTIONAR MESA</h1>
            <form action="{{ Route('Mesas.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 grid-cols-1">
                    <div class="mb-1">
                        <label for="estado" class="mb-3 block text-base font-medium text-[#07074D]">
                            ESTADO:
                        </label>
                        <input type="text" name="estado" id="estado" value="Disponible"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="mb-1">
                        <label for="mesa" class="mb-3 block text-base font-medium text-[#07074D]">
                            Tamaño:
                        </label>
                        <select name="mesa" id="mesa"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            @foreach ($tipo as $r)
                                <option value="{{ $r->id_tipo_mesa }}">{{ $r->mesa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="Ubicacion" class="mb-3 block text-base font-medium text-[#07074D]">
                            Ubicacion:
                        </label>
                        <select name="Ubicacion" id="Ubicacion"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            @foreach ($ambiente as $r)
                                <option value="{{ $r->id_ambiente }}">{{ $r->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit"
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
