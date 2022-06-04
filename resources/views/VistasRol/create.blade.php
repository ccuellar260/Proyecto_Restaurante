<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cracion de Rol</title>
</head>
<body>
    <h1>Registro de Roles</h1>
    <form action="{{Route('Rol.store')}}"
        method="POST">
        @csrf
        <p>introudce el codigo:
            <input type="number"
                   name='id_rol'></p>
        <p>introduce el Rol:
             <input type="text"
             name='nombre'></p>
        <p>introduce la descripcion:</p>
        <textarea name="descripcion" cols="20" rows="5"></textarea> <br>
        <button type="submit">enviar</button>
    </form>
</body>
</html>
