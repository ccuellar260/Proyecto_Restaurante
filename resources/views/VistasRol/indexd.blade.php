<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roles</title>
</head>
<body>
   <h1 >que onda putoo!!</h1>
   <button > <a href="{{Route('Rol.create')}}">CREAR UN ROL</a> </button>

   <table class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
    @foreach ($tabla as $fila )
        <tr class="">

            <td class="">{{$fila->id_rol}} -
                {{$fila->nombre}} - {{$fila->descripcion}}</td>

            <td class="">
                <a href="{{Route('Rol.edit',$fila->id_rol)}}"
                class="">Editar
                <a>
            </td>

            <td >
                 <!--se utiliza el metodo Post para anterar la bse de datos-->
                 <form action="{{Route('Rol.destroy',$fila)}}" method="POST">
                    @csrf <!-- token de seguridad-->
                    @method('DELETE')

                    <!-- mostar boton eliminar-->
                    <input type="submit"
                           value="Eliminar" class=""
                           onclick="return confirm('Desea Eliminar?')"
                    >
             <!-- volver a preguntar si desea eliminar -->
                </form>
            </td>
        </tr>

    @endforeach
</table>

</body>
</html>


