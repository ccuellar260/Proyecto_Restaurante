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
    <form action="{{Route('Empleado.store')}}"
        method="POST">
        @csrf
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
