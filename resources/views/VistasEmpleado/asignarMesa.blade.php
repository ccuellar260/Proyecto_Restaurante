@extends('navegador')

@section('Contenido')
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-center font-bold text-3xl">ASIGNAR MESA</h1>
            <form action="{{ }}" method="POST">
                @csrf



                <div class="mb-5">
                    <label for="nombre_completo" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nombre completo:
                    </label>
                    <input type="text" name="nombre_completo" value='{{ $fila->nombre_completo }}' id="nombre_completo"
                        placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>





            </form>
        </div>
    </div>
@endsection
