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
                        action="{{ route('Login') }}">
                        @csrf

                        <p>
                            <!-- usando el status solo muestra una edicion-->
                            @if (session('statusLogout')) <!--Existe el atributo status?-->
                            <br>   <!-- mostarr lo que esta en status-->
                            <p class="text-white">{{session('statusLogout')}}</p>
                           @endif
                        </p>
                        <p class="text-white font-medium text-center text-lg font-bold">INICIO DE SESION</p>
                        <div class="">
                            <label class="block text-sm text-white" for="email">Introdusca su correo </label>
                            <input
                                class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                                type="email"  required autofocus id="email" name="correo_electronico"
                                value='{{old('correo_electronico')}}'
                                placeholder="Ejemplo007@gmail.com"
                                aria-label="email" required>
                                @error('correo_electronico')  <p class="text-white">{{$message}}</p> @enderror
                                <br>
                        </div>
                        <div class="mt-2">
                            <label class="block  text-sm text-white">Introdusca su contrasena </label>
                            <input
                                class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                                type="password" id="password" name="password" placeholder="Contrasena"

                                arial-label="password" required>
                                @error('password')  <td class="text-white">{{$message}} </td> @enderror

                        </div>

                        <div class="mt-2">
                            <label>
                                <input type="checkbox" name="recordar">
                                Recordar contrasena
                            </label> <br>
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

</body>

</html>
