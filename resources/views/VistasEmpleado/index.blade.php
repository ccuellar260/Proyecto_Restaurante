<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleado</title>
</head>
<body>
   <h1>bienvendio al registro de empleados</h1>
   <button > <a href="{{Route('Empleado.create')}}">REGSITRAR UN EMPLEADO</a> </button>

   <table class="">
    @foreach ($tabla as $fila )
        <tr class="">

            <td class="">{{$fila->ci}} -
                {{$fila->nombre_completo}} - {{$fila->telefono}}</td>

            <td class="">
                <a href="{{Route('Empleado.edit',$fila->ci)}}"
                class="">Editar
                <a>
            </td>

            <td >
                 <!--se utiliza el metodo Post para anterar la bse de datos-->
                 <form action="{{Route('Empleado.destroy',$fila)}}" method="POST">
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


