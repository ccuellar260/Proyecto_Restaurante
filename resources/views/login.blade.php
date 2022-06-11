<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h3>Inicio de sesion</h3>


    <form action=""
          method="POST">
          @csrf

          <label>Introdusca su correo <br></label>
        <input type="email" required autofocus
               name='correo_electronico'
               value='{{old('correo_electronico')}}'
               placeholder="Email...">
               @error('correo_electronico') {{$message}}@enderror
               <br>
        <label>Introdusca su contrasena <br></label>
               <input type="password" required
               name='password'
               value=''
               placeholder="Password..">
               @error('password') {{$message}}@enderror
               <br>
        <label>
            <input type="checkbox" name="recordar">
            Recordar contrasena
        </label> <br>
        <button type="submit">Login</button>
    </form>

</body>
</html>
