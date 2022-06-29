@extends('navegador')

@section('Contenido')
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
        <h1 class="text-center font-bold text-3xl">REGISTRAR EMPLEADO</h1>
      <form action="{{Route('Empleado.store')}}" method="POST">
        @csrf
        <div class="mb-5">
          <label
            for="name"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
          cree un usuario:
          </label>
          <input
            type="text"
            name="usuario"
            id="name"
            placeholder="Ingrese un usuario"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
          @error('usuario')
                  <small>*{{$message}}</small> <br>
          @enderror
        </div>
        <div class="mb-5">
          <label
            for="email"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Seleccionar Rol:
          </label>
          <select name="Rol"
                >

             @foreach ($Rol  as $f)
                  <option value='{{$f->id_rol}}''>{{$f->nombre}}</option>
             @endforeach
         </select>
        </div>
        <div class="mb-5">
          <label
            for="email"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Ingrese su correo:
          </label>
          <input
            type="email"
            name="correo"
            id="email"
            placeholder="example@domain.com"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div class="mb-5">
          <label
            for="email"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Contraseña
          </label>
          <input
            type="password"
            name="contrasena"
            id="password"
            placeholder="*************"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div class="mb-5">
          <label
            for="ci"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Ingrese su CI:
          </label>
          <input
            type="number"
            name="ci"
            id="email"
            placeholder=""
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div class="mb-5">
          <label
            for="nombre_completo"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Ingrese su nombre completo:
          </label>
          <input
            type="text"
            name="nombre_completo"
            id="nombre_completo"
            placeholder=""
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div class="mb-5">
          <label
            for="email"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Ingrese su telefono:
          </label>
          <input
            type="number"
            name="telefono"
            id="telefono"
            placeholder=""
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div>
          <button type="submit"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
          >
            Enviar
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
