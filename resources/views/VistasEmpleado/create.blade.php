@php
if(isset($_POST['Rol']))
$Rol=$_POST['Rol']
@endphp



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regsitro Emplados</title>
</head>
<body>
    <h1>Registro de Emplados</h1>

    <!-- pa que devuelva la id de $f->id_rol-->


    <form action="{{Route('Empleado.store')}}"
        method="POST">

        <p> cree un usuario:
            <input type="text"
                   name='usuario'>
            @error('usuario')
                <small>*{{$message}}</small> <br>
            @enderror
        </p>


         <!-- The second value will be selected initially -->
         <label >Selecionar Rol: </label>
       <select name="Rol"
              >

           @foreach ($Rol  as $f)
                <option value='{{$f->id_rol}}''>{{$f->nombre}}</option>
           @endforeach
       </select>

        <p>Ingrese su correo:
            <input type="email"
                   name='correo'></p>

         <p>Contrasena:
         <input type="password"
           name='contrasena'></p>

        <p>introudce el ci:
            <input type="number"
                   name='ci'></p>

        <p>introduce el nombre completo:
            <input type="text"
            name='nombre_completo'></p>

        <p>introduce la telefono:
            <input type="number"
            name='telefono'></p>



        <button type="submit">enviar</button>
    </form>
</body>
</html>
