@extends('navegador')

@section('Contenido')

    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto bg-white p-10">

        <form action="{{ Route('Empleado.store') }}" method="POST">
            @csrf
            <div class="w-full">
              <div class="xl:w-12/12 w-12/12 mx-0 xl:mx-0">
                  <div class="rounded relative mt-2 h-48">
                      <img src="https://cdn.tuk.dev/assets/webapp/forms/form_layouts/form1.jpg" alt=""
                          class="w-full h-full object-cover rounded absolute shadow" />
                      <div class="absolute bg-black opacity-50 top-0 right-0 bottom-0 left-0 rounded"></div>
                      <div class="flex items-center px-3 py-2 rounded absolute right-0 mr-4 mt-4 cursor-pointer">
                          <p class="text-xs text-gray-100">Change Cover Photo</p>
                          <div class="ml-2 text-gray-100">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="18"
                                  height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                  stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" />
                                  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                  <line x1="16" y1="5" x2="19" y2="8" />
                              </svg>
                          </div>
                      </div>
                      <div
                          class="w-20 h-20 rounded-full bg-cover bg-center bg-no-repeat absolute bottom-0 -mb-10 ml-12 shadow flex items-center justify-center">
                          <img src="https://cdn.tuk.dev/assets/webapp/forms/form_layouts/form2.jpg" alt=""
                              class="absolute z-0 h-full w-full object-cover rounded-full shadow top-0 left-0 bottom-0 right-0" />
                          <div class="absolute bg-black opacity-50 top-0 right-0 bottom-0 left-0 rounded-full z-0"></div>
                          <div class="cursor-pointer flex flex-col justify-center items-center z-10 text-gray-100">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20"
                                  height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                  stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" />
                                  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                  <line x1="16" y1="5" x2="19" y2="8" />
                              </svg>
                              <p class="text-xs text-gray-100">Edit Picture</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <div class="mt-12 grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Nombre de usuario
                    </label>
                    <input type="text" id="name" name="usuario"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="ingrese usuario" required />
                    @error('usuario')
                        <small>*{{ $message }}</small> <br>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Seleccionar Rol
                    </label>
                    <select name="Rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >

                        @foreach ($Rol as $f)
                            <option value='{{ $f->id_rol }}''>{{ $f->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="correo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="example@domain.com" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Contraseña</label>
                    <input type="password" id="password" name="contrasena"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="***********" required/>
                </div>
                <div>
                    <label for="ci" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        C.I.:</label>
                    <input type="number" id="email" name="ci"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Telefono</label>
                    <input type="number" id="telefono" name="telefono"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                </div>
            </div>
            <div class="mb-6">
                <label for="nombre_completo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Nombre completo</label>
                <input type="text" id="nombre_completo" name="nombre_completo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
        </form>
    </div>
@endsection
