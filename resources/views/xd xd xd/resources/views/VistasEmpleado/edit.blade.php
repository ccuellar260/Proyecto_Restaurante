@extends('navegador')

@section('Contenido')
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-center font-bold text-3xl">EDITAR EMPLEADO</h1>
            <form action="{{ Route('Empleado.store') }}" method="POST">
                @csrf


                <div class="mb-5">
                    <label for="ci" class="mb-3 block text-base font-medium text-[#07074D]">
                        Numero de carnet:
                    </label>
                    <input type="number" name="ci" value="{{ $fila->ci }}" id="email" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="nombre_completo" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nombre completo:
                    </label>
                    <input type="text" name="nombre_completo" value='{{ $fila->nombre_completo }}' id="nombre_completo"
                        placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                        Telefono:
                    </label>
                    <input type="number" name="telefono" value='{{ $fila->telefono }}' id="telefono" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="flex justify-between">
                    <div>
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                            <a href="{{ route('Rol.index') }}">Volver</a>
                        </button>
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
