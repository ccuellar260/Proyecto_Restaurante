
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
						<h3 class="pt-4 text-2xl text-center">BIENVENIDO</h3>
						<form class="px-8 pt-6  mb-4 bg-white rounded" method="POST" action="{{ route('Login') }}">
                            @csrf

                            <p>
                                <!-- usando el status solo muestra una edicion-->
                                @if (session('statusLogout')) <!--Existe el atributo status?-->
                                    <div class=" max-w-lg bg-green-200 mx-auto mt-3 mb-3 p-2 flex space-x-2">
                                        <svg class="w-6 h-6 stroke-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        <p class="text-green-900 font-semibold">{{session('statusLogout')}}</p>
                                    </div>

                                @elseif (session("statusContra"))
                                    <div class=" max-w-lg bg-green-200 mx-auto mt-3 mb-3 p-2 flex space-x-2">
                                        <svg class="w-6 h-6 stroke-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        <p class="text-green-900 font-semibold">{{session('statusContra')}}</p>
                                    </div>
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
                                @error('correo')  <p class="text-red-600">*{{$message}}</p> @enderror
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

                                @error('password')  <p class="text-red-600">*{{$message}} </p> @enderror
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
                        </form>

							{{-- <div class="text-center">
								<a
									class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
									href="./register.html"
								>
									Create an Account!
								</a>
							</div> --}}

                       <!-- @include('VistasAuth.modelOlvidasteContra')-->

					</div> {{-- bienvendio --}}
				</div>
			</div>
		</div> {{-- container --}}
	</body>
</html>

