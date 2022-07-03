<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .login {
            background: url('{{ asset('img/chancho al palo.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form class="max-w-sm m-4 p-10 bg-stone-900 bg-opacity-50 rounded shadow-xl" method="POST"
                        action="{{ route('login') }}">
                        @csrf
                        <p class="text-white font-medium text-center text-lg font-bold">LOGIN</p>
                        <div class="">
                            <label class="block text-sm text-white" for="email">E-mail</label>
                            <input
                                class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                                type="email" id="email" name="correo_electronico" placeholder="Digite o e-mail"
                                aria-label="email" required>
                        </div>
                        <div class="mt-2">
                            <label class="block  text-sm text-white">Senha</label>
                            <input
                                class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                                type="password" id="password" name="password" placeholder="Digite a sua senha"
                                arial-label="password" required>
                        </div>

                        <div class="mt-4 items-center flex justify-between">
                            <button
                                class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded"
                                type="submit">Entrar</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>






    <!--<div class="h-screen flex">
        <div class="hidden lg:flex w-full lg:w-1/2 login_img_section justify-around items-center">
            <div class="bg-black opacity-20 inset-0 z-0"></div>
            <div class="w-full mx-auto px-20 flex-col items-center space-y-6">
                <h1 class="text-white font-bold text-4xl font-sans">RESTAURANT-KUREGRILL</h1>
                <p class="text-white mt-1">El chancho al palo comenzó a prepararse en los años 80 en una familia
                    apasionada a la comida campestre. En cada reunión, o celebración, este platillo era elaborado de una
                    manera muy peculiar que asa la carne al palo. dando un sabor espectacular.</p>
            </div>
        </div>
        <div class="flex w-full lg:w-1/2 justify-center items-center bg-white space-y-8">
            <div class="w-full px-8 md:px-32 lg:px-24">
                <form class="bg-white rounded-md shadow-2xl p-5" method="POST">
                    @csrf
                    <h1 class="text-gray-800 font-bold text-2xl mb-1">INICIAR SESION</h1>
                    <p class="text-sm font-normal text-gray-600 mb-8">Bienvenido</p>
                    <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <input id="email" class="pl-2 w-full outline-none border-none" type="email"
                            name="correo_electronico" placeholder="Email Address" />
                    </div>
                    <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fillRule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clipRule="evenodd" />
                        </svg>
                        <input class="pl-2 w-full outline-none border-none" type="password" name="password"
                            id="password" placeholder="Password" />
                    </div>
                    <button type="submit"
                        class="block w-full bg-indigo-600 mt-5 py-2 rounded-2xl hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

-->
</body>

</html>
