@extends('navegador')

@section('Contenido')
    <div class="w-full  h-screen">
        <div class="bg-gradient-to-b to-blue-600 h-80"></div>
        <div class="max-w-3xl mx-auto px-6 sm:px-6 lg:px-8 mb-8">
            <div class="bg-gray-900 w-full shadow rounded p-8 sm:p-12 -mt-72">
                <p class="text-3xl font-bold leading-7 text-center text-white">Registro de Roles</p>
                <form action="{{Route('Rol.store')}}" method="post">
                    @csrf
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none text-gray-300">introduce el Rol:</label>
                            <input type="text" name="name"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                        </div>
                    </div>
                    <div>
                        <div class="w-full flex flex-col mt-8">
                            <label class="font-semibold leading-none text-gray-300">Permisos:</label>
                                @foreach ($permissions as $id => $permission)
                                    <label class="block text-gray-500 font-bold mb-2">
                                        <input type="checkbox" name="permissions[]" value="{{$id}}">
                                        {{$permission}}
                                    </label>
                                @endforeach
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <button type="submit"
                            class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
