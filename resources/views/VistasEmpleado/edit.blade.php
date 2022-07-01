@extends('navegador')

@section('Contenido')
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-center font-bold text-3xl">EDITAR EMPLEADO</h1>
            <form action="{{ Route('Empleado.update',$fila->ci) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- <div class="w-20 h-20 rounded-full bg-cover bg-center bg-no-repeat absolute bottom-0 -mb-10 ml-12 shadow flex items-center justify-center">
                    <img src="{{ $fila->foto }}" alt=""
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
                </div> --}}
                <div class="mb-5">
                    <label for="usuario" class="mb-3 block text-base font-medium text-[#07074D]">
                        Usuario:
                    </label>
                    <input type="text" name="nombre_usuario" value="{{ $fila->nombre_usuario }}" id="usuario" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" readonly/>
                </div>
                <div class="mb-5">
                    <label for="correo" class="mb-3 block text-base font-medium text-[#07074D]">
                        Correo:

                    </label>
                    <input type="email" name="correo" value="{{ $fila->correo_electronico }}" id="correo" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>


                <div class="mb-5">
                    <label for="contra_new" class="mb-3 block text-base font-medium text-[#07074D]">
                        Contrasena Nueva:
                    </label>
                    <input type="password" name="contra_new" value="" id="contrasena" placeholder="password"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @if (session("contra_vacia_contra_new")) <!--Existe el atributo status?-->
                        <!-- mostarr lo que esta en status-->
                        <label class="text-red-500"> <b>*{{session('contra_vacia_contra_new')}}</b> </label>
                        @endif

                </div>


                <div class="mb-5">
                    <label for="contra_new2" class="mb-3 block text-base font-medium text-[#07074D]">
                        Repita Contrasena Nueva:
                    </label>
                    <input type="password" name="contra_new2" value="" id="contrasena" placeholder="password"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @if (session("contra_vacia_contra_new2")) <!--Existe el atributo status?-->
                        <!-- mostarr lo que esta en status-->
                        <label class="text-red-500"> <b>*{{session('contra_vacia_contra_new2')}}</b> </label>
                         @elseif (session("Contra_Nocoincide"))
                                <label class="text-red-500"> <b>*{{session('Contra_Nocoincide')}}</b> </label>
                          @endif
                </div>



                <div class="mb-5">
                    <label for="ci" class="mb-3 block text-base font-medium text-[#07074D]">
                        Numero de carnet:

                    </label>
                    <input type="number" name="ci" value="{{ $fila->ci }}" id="email" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"  readonly  />
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
                    <label for="telefono" class="mb-3 block text-base font-medium text-[#07074D]">
                        Telefono:
                    </label>
                    <input type="number" name="telefono" value='{{ $fila->telefono }}' id="telefono" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="rol" class="mb-3 block text-base font-medium text-[#07074D]">
                        Rol:

                    </label>
                    <input type="text" name="rol" value="{{ $fila->descripcion }}" id="rol" placeholder=""
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" readonly />
                </div>
                <div class="mb-5">
                    <label for="contra_antigua" class="mb-3 block text-base font-medium text-[#07074D]">
                        Confirmar Datos con la Contrasena Actual:

                    </label>
                    <input type="password" name="contra_antigua" value="" id="contrasena" placeholder="password"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @if (session("Contra_incorrecta")) <!--Existe el atributo status?-->
                        <!-- mostarr lo que esta en status-->
                        <label class="text-red-500"> <b>*{{session('Contra_incorrecta')}}</b> </label>
                         @endif
                </div>
                <div class="flex justify-between">
                    <div>
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                            <a href="{{ route('Empleado.index') }}">Volver</a>
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
