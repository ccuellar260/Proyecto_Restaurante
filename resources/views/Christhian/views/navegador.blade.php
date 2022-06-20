<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>Restaurante</title>
</head>

<body class="bg-gray-100">
    <div class="bg-white flex p-1 shadow-sm ">
        <h6 class="flex-grow text-2xl font-bold mt-2 ml-2">Restaurant <span class="text-red-800">KURE GRILL</span></h6>
        <p class="mt-2 p-2">Christian Maldonado</p>
        <div class="mr-4 w-14 h-14 rounded-full bg-gray-300 border-2 border-white">
            <img
            src=""
            class="rounded-full w-auto"
            />
        </div>
    </div>
    @if (session('status'))
        <!--Existe el atributo status?-->
        <br />
        <!-- mostarr lo que esta en status-->
        {{ session('status') }}
    @endif

    <!-- caso contrario mostrar lo demas botones -->
    <div class="flex screen-full ">
        <div class="p-2 border-r w-60 border-gray-200 bg-indigo-900">
            <h6 class="font-bold mb-4"></h6>
            <ul">
                <li class="mb-4 flex hover:bg-slate-500 rounded">
                    <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                    <span class="self-center text-white"><a href="{{ Route('Dashboard') }}"> Dasboard</a></span>
                </li>
                @guest
                    <!--mostrar login por que esta como invitado-->
                    <a href="{{ Route('Login') }}"
                        class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Login</a>
                @else
                    <form action="{{ Route('Logout') }}" method="POST">
                        @csrf
                        <li class="mb-4 flex hover:bg-slate-500 rounded">
                            <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                  </svg>
                            </div>
                            <span class="self-center text-white"><a href="#"
                                    onclick="this.closest('form').submit()">Logout</a></span>
                        </li>
                        <!-- envio de datos por a, lo mismo que boton-->
                    </form>
                @endguest
                <li class="mb-4 flex hover:bg-slate-500 rounded">
                    <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                          </svg>
                    </div>
                    <span class="self-center text-white"><a
                            href="{{ Route('Pedido', Auth::user()->nombre_usuario) }}">Gestionar
                            Pedidos</a></span>
                </li>
                @if (Auth()->user()->id_rol == 1)
                    <li class="mb-4 flex hover:bg-slate-500 rounded">
                        <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="self-center text-white"><a href="{{ Route('Rol.index') }}">Gestionar
                                Roles</a></span>
                    </li>
                    <li class="mb-4 flex hover:bg-slate-500 rounded">
                        <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                        </div>
                        <span class="self-center text-white"><a href="{{ Route('Empleado.index') }}">Gestionar
                                Empleados</a></span>
                    </li>
                    <li class="mb-4 flex hover:bg-slate-500 rounded">
                        <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                              </svg>
                        </div>
                        <span class="self-center text-white"><a href="{{ Route('Mesas.index') }}">Gestionar
                                Mesas</a></span>
                    </li>
                    <li class="mb-4 flex hover:bg-slate-500 rounded">
                        <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                        </div>
                        <span class="self-center text-white"><a href="{{ Route('Producto.index') }}">Gestionar
                                Productos</a></span>
                    </li>
                    <li class="mb-4 flex hover:bg-slate-500 rounded">
                        <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                              </svg>
                        </div>
                        <span class="self-center text-white"><a
                                href="{{ Route('Cliente.index') }}">Clientes</a></span>
                    </li>
                    <li class="mb-4 flex hover:bg-slate-500 rounded">
                        <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                        </div>
                        <span class="self-center text-white"><a
                                href="{{ Route('Turno.index') }}">Horarios</a></span>
                    </li>
                    <li class="mb-4 flex hover:bg-slate-500 rounded">
                        <div class="bg-write shadow-sm p-2 mr-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                              </svg>
                        </div>
                        <span class="self-center text-white"><a
                                href="{{ Route('Reserva.index') }}">Reservas</a></span>
                    </li>
                @endif
            </ul>

            @if (Auth()->user()->id_rol == 2)
                <a href="{{ Route('Pedido', Auth::user()->nombre_usuario) }}"
                    class="block font-medium text-gray-500 dark:text-gray-300 hover:underline"> Consultar Producto</a>
            @endif
        </div>
        <div class=" mt-6 lg:mt-0 lg:px-2 lg:w-4/5 from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br">
            @yield('Contenido')
        </div>
    </div>

</body>

</html>
