
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
						<h3 class=" mb-4  pt-4 text-2xl text-center">RESTABLECER CONTRASENA</h3>
						<form class="px-8 pt-6  mb-4 bg-white rounded" method="POST"
                              action="{{ route('Login.updateContrasena',$user->nombre_usuario) }}">
                            @csrf
                            @method('PUT')
                            <p>
                                <!-- usando el status solo muestra una edicion-->
                                @if (session('statusLogout')) <!--Existe el atributo status?-->
                                <br>   <!-- mostarr lo que esta en status-->
                                <p class="text-white">{{session('statusLogout')}}</p>
                               @endif
                            </p>


                            <div class="mb-6">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Correo Electronico
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									type="email"
                                    name="correo_electronico"
                                    value='{{$user->correo_electronico}}'
                                    required autofocus
                                    aria-label="email" readonly
								/>
                            </div>

                            <hr class="mb-4 border-t" />

							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="password">
									Ingrese la nueva contrasena:
								</label>
								<input
									class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="password"
									type="password"
                                    name="password"
									placeholder="******************"
                                arial-label="password" required>

                           </div>
                            <div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="password">
									Verificar nueva contrasena:
								</label>
								<input
									class="w-full px-3 py-2 mb-6 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="password1"
									type="password"
                                    name="password1"
									placeholder="******************"
                                arial-label="password1" required>

                                @error('passwordxd')  <p class="text-red-600">*{{$message}} </p> @enderror
							</div>

							<div class="mb-6 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="submit"
								>
									GUARDAR
								</button>
							</div>

                        </form>


					</div>
				</div>
			</div>
		</div>
	</body>
</html>

