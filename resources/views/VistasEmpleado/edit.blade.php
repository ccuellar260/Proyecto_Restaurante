<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar de emplados</title>
</head>
<body>
    <form
        action="{{Route('Empleado.update',$fila)}}"
        method="POST"
        >
            <!-- falto hace el  action=route('Panel.update')-->
            @csrf
            @method('PUT')

            <p>Numero de Carnet:
                <input type="number"
                       name='ci'
                       value="{{$fila->ci}}"></p>

            <label class=""">Nombre completo:: </label>
            <input type="text"
                    name="nombre_completo"
                    class=""
                    value ='{{$fila->nombre_completo}}'>


             <br>

             <label class=""">Telefono: </label>
             <input type="number"
                     name="telefono"
                     class=""
                     value ='{{$fila->telefono}}'>



        <div>
            <a href="{{route('Rol.index')}}">Volver</a>
        </div>
        <button type="submit">Editar Registro</button>

     </form>

</body>
</html>
