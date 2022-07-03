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

<!DOCTYPE html>
<html lang="en">

<<<<<<< HEAD
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
=======
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
>>>>>>> fe32e685ca59aee0fd6e2347bace21f31456b2c9

</head>
<body class="font-mono bg-gray-400 h-screen login bg-cover">
		<!-- Container -->
		<div class="container mx-auto pt-10">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div
						class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
						style="background-image: url('{{ asset('img/LOGO_KUREGRILL.png') }}')"
					></div>
					<!-- Col -->
					<div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center">BIENVENIDO</h3>
						<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="{{ route('Login') }}">
                            @csrf
                            <p>
                                <!-- usando el status solo muestra una edicion-->
                                @if (session('statusLogout')) <!--Existe el atributo status?-->
                                <br>   <!-- mostarr lo que esta en status-->
                                <p class="text-white">{{session('statusLogout')}}</p>
                               @endif
                            </p>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Correo Electronico
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="email"
									type="email"
                                    name="correo_electronico"
                                    value='{{old('correo_electronico')}}'
                                    required autofocus
									placeholder="Ejemplo007@gmail.com"
                                    aria-label="email" required
								/>
                                @error('correo_electronico')  <p class="text-white">{{$message}}</p> @enderror
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="password">
									Contraseña
								</label>
								<input
									class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="password"
									type="password"
                                    name="password"
									placeholder="******************"
                                arial-label="password" required>
<<<<<<< HEAD
=======
                                @error('password')  <td class="text-white">{{$message}} </td> @enderror
>>>>>>> fe32e685ca59aee0fd6e2347bace21f31456b2c9

                                @error('password')  <td class="text-white">{{$message}} </td> @enderror
							</div>
							<div class="mb-4">
								<input class="mr-2 leading-tight" type="checkbox" id="checkbox_id" />
								<label class="text-sm" for="checkbox_id" name="recordar">
									Recordar contrasena
								</label>
							</div>
							<div class="mb-6 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="submit"
								>
									Entrar
								</button>
							</div>
                            <hr class="mb-6 border-t" />
							<div class="text-center">
								<a
									class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
									href="./register.html"
								>
									Create an Account!
								</a>
							</div>
							<div class="text-center">
								<a
									class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
									href="./forgot-password.html"
								>
									Forgot Password?
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<<<<<<< HEAD
=======
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
>>>>>>> fe32e685ca59aee0fd6e2347bace21f31456b2c9

</html>
