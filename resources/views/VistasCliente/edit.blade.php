@extends('navegador')

@section('Contenido')
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto bg-white p-8">

        <form action="{{ Route('Cliente.Update', $cliente->ci) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre
                        Completo</label>
                    <input type="text" id="nombre" name="nombre_completo" value="{{ old('nombre_completo', $cliente->nombre_completo) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('nombre_completo')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label for="carnet_identidad"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">C.I.:</label>
                    <input type="number" id="carnet_identidad" name="ci" value="{{ $cliente->ci }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                </div>
                <div>
                    <label for="telefeno"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Telefono:</label>
                    <input type="number" id="telefeno" name="telefeno" value="{{ old('telefono', $cliente->telefono )}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    @error('telefono')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label for="nit"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nit:</label>
                    <input type="number" id="nit" name="NIT" value="{{ old('NIT', $cliente->NIT )}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    @error('NIT')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>
                <div>
                    <div class="grid gap-6 grid-cols-3">
                        <div>

                        </div>
                        <div>

                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Guardar
                        </button>
                    </div>
                </div>
        </form>

    </div>
@endsection
