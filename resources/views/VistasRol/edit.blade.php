<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Roles</title>
</head>
<body>
    <form
        action="{{Route('Rol.update',$fila->id_rol)}}"
        method="POST"
        >
            <!-- falto hace el  action=route('Panel.update')-->
            @csrf
            @method('PUT')

            <label class=""">id rol </label>
            <input type="number"
                    name="id_rol"
                    class=""
                    value ='{{$fila->id_rol}}'>
                    <br>



            <label class=""">Nombre: </label>
            <input type="text"
                    name="nombre"
                    class=""
                    value ='{{$fila->nombre}}'>


             <br>

            <label class= "">Descripcion: <br> </label>
            <textarea name="descripcion" rows="5"
                class="">{{$fila->descripcion}}</textarea>


        <div>
            <a href="{{route('Rol.index')}}">Volver</a>
        </div>
        <button type="submit">Editar Registro</button>

     </form>

</body>
</html>
