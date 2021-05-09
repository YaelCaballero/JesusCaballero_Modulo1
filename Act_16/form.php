<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <?php
        session_start();
        /*Este es el formulario que se debe responder a la hora de iniciar sesión. Si el usuario ya cuenta con la sesión abierta
        el else que se encuentra abajo lo redireccionará a la tabla de información que posee index.php*/
        if (!(isset($_SESSION["nombre"]))) {
            echo "<form action=\"index.php\" method=\"POST\"><fieldset>
            <legend>Inicio de sesión</legend>
            <label> Nombres:
                <input type='text' name='nombre' required>
            </label> <br><br>
            <label> Apellidos:
                <input type='text' name='apellidos' required>
            </label> <br><br>
            <label> Grupo:
                <input type='number' name='grupo' required>
            </label> <br><br>
            <label> Fecha de nacimiento:
                <input type='date' name='fechaNac' required>
            </label> <br><br>
            <label> Correo electrónico:
                <input type='email' name='correo' required>
            </label> <br><br>
            <label> Contraseña:
                <input type='password' name='cont' required>
            </label> <br><br>
                <input type='submit' value='enviar'>
            </form></fieldset>";
        } else {
            header("location: index.php");
        }
        
    ?>
</body>
</html>