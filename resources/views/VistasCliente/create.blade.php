@extends('navegador')

@section('Contenido')
    <div class="max-w-2xl mx-auto bg-white p-12 my-10">
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-center font-bold text-3xl mb-5">REGISTRO DE CLIENTES</h1>
            <form action="{{ Route('Cliente.Store') }}" method="POST">
                @csrf
                <div class="grid gap-2 grid-cols-2">
                    <div class="mb-5">
                        <label for="carnet identidad" class="mb-3 block text-base font-medium text-[#07074D]">
                            Carnet de Identidad:
                        </label>
                        <input type="number" name="ci" id="name" value="{{old('ci')}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('ci')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="nombre_completo" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nombre_Completo:
                        </label>
                        <input type="text" name="nombre_completo" id="nombre_completo" value="{{old('nombre_completo')}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('nombre_completo')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="telefono" class="mb-3 block text-base font-medium text-[#07074D]">
                            Telefono:
                        </label>
                        <input type="integer" name="telefono" id="number" placeholder="" value="{{old('telefono')}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('telefono')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="NIT" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nit:
                        </label>
                        <input type="integer" name="NIT" id="text" placeholder="" value="{{old('NIT')}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('NIT')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
