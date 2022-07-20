@extends('navegador')
@section('Contenido')
    {{-- <div class="flex justify-end pr-3 mb-3">
        <button type="submit"
            class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
            <a href="{{ Route('Rol.create') }}">CREAR UN ROL</a>
        </button>
    </div> --}}
    <div class="bg-white p-2 rounded-md w-full">
        <div>
            <div class="bg-white flex p-3">
                <h6 class="flex-grow text-2xl font-bold text-center">Roles</h6>
                <button type="button"
                    class="flex-none mr-2 text-x bg-blue-500 hover:bg-indigo-600 text-white py-2 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="{{Route('Rol.create')}}">
                        CREAR UN ROL
                    </a>
                </button>
            </div>
{{-- ROLES --}}
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ROLES
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    PERMISOS
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ACCIONES
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $fila)

                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap"> {{ $fila->id }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $fila->name }} </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    @forelse ($fila->permissions as $permission)
                                        <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                            {{ $permission->name }}</span>
                                    @empty
                                        <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                                            No hay permisos agregados</span>
                                    @endforelse
                                </td>
                                {{-- acciones --}}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <button type="button"
                                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ Route('Rol.edit', $fila->id) }}">
                                            EDITAR
                                        </a></button>
                                        {{-- <button type="button"
                                            class="mr-3 text-sm bg-green-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            <a href="{{ Route('Rol.edit', $fila->id) }}">
                                                ADD
                                            </a></button> --}}
                                            <button type="button"
                                                class="mr-3 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                <form action="{{ Route('Rol.destroy', $fila) }}" method="POST">
                                                    @csrf
                                                    <!-- token de seguridad-->
                                                    @method('DELETE')

                                                    <!-- mostar boton eliminar-->
                                                    <input type="submit" value="ELIMINAR" class=""
                                                        onclick="return confirm('Desea Eliminar?')">
                                                    <!-- volver a preguntar si desea eliminar -->
                                                </form>
                                                </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap">No hay Roles registrados</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- PERMISOS --}}
    <div class="bg-white p-2 rounded-md w-full">
        <div>
            <div class="bg-white flex p-3">
                <h6 class="flex-grow text-2xl font-bold text-center">PERMISOS</h6>
                <button type="button"
                    class="mr-2 text-x bg-blue-500 hover:bg-indigo-600 text-white py-2 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="{{Route('Permiso.create')}}">
                        CREAR PERMISO
                    </a>
                </button>
            </div>

            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    PERMISO
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Name Guard
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Created AT
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ACCIONES
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $permisos as $fila )
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap"> {{ $fila->id }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $fila->name }} </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $fila->guard_name }} </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $fila->created_at }} </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <button type="button"
                                            class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            <a href="{{ Route('Permiso.edit', $fila->id) }}">
                                                EDITAR
                                            </a></button>
                                            <button type="button"
                                                class="mr-3 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                <form action="{{ Route('Permiso.deletePermisos', $fila->id) }}" method="POST">
                                                    @csrf
                                                    <!-- token de seguridad-->
                                                    @method('DELETE')
                                                    <!-- mostar boton eliminar-->
                                                    <input type="submit" value="ELIMINAR" class=""
                                                        onclick="return confirm('Desea Eliminar? {{$fila->id}}')">
                                                    <!-- volver a preguntar si desea eliminar -->
                                                </form>
                                                </button>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    <p class="text-gray-900 whitespace-no-wrap">No hay datos</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
