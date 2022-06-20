@extends('navegador')

@section('Contenido')
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-center font-bold text-3xl mb-5">EDITAR AMBIENTE</h1>
            <form action="{{Route('Cliente.Update',$cliente->ci)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="carnet identidad" class="mb-3 block text-base font-medium text-[#07074D]">
                        Ci
                    </label>
                    <input type="integer" name="ci" id="name" value="{{$cliente->ci}}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="nombre" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nombre Completo:
                    </label>
                    <textarea name="nombre_completo" id="" cols="30" rows="4"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{$cliente->nombre_completo}}</textarea>
                </div>
                <div class="mb-5">
                    <label for="telefeno" class="mb-3 block text-base font-medium text-[#07074D]">
                        Telefeno:
                    </label>
                    <input type="integer" name="telefono" value="{{$cliente->telefono}}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="nit" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nit
                    </label>
                    <input type="integer" name="NIT" id="" value="{{$cliente->NIT}}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div>
                    <button type="submit"
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
