<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de datos del usuario</title>
</head>
<body>
    <?php
        session_start();
        /*Este if se utiliza para que se imprima la información guardada en el servidor de ya haber iniciado sesión no recientemente.
        De lo contrario se producirá un error ya que no encontrará información del formulario*/ 
        if (isset($_POST["nombre"])) {
            $_SESSION["nombre"] = $_POST["nombre"];
            $_SESSION["apellidos"] = $_POST["apellidos"];
            $_SESSION["grupo"] = $_POST["grupo"];
            $_SESSION["fechaNac"] = $_POST["fechaNac"];
            $_SESSION["correo"] = $_POST["correo"];
            $_SESSION["cont"] = $_POST["cont"];
        }

        /*En caso de que no se haya iniciado sesión y se quiera meter al index.php, se imprimirá un aviso de que regrese al formulario para
        iinciar sesión. En caso de que ya haya ingresado a la sesión se imprimirá la información proporcionada a excepción de la contraseña.*/
        if (!isset($_SESSION["nombre"])) {
            echo "<h1>Usted no ha iniciado sesión. Regrese al formulario para crear una cuenta.</h1>";
            echo "<form action=\"form.php\" method=\"POST\"><input type=\"submit\" value=\"regresar al formulario\"></form>";
        } else {
            echo "<table border=\"1\" width=\"300\" style=\"margin: 0 auto; border-collapse:separate;\"><tr>";
            echo "<thead><tr><th colspan=\"2\">Información de inicio de sesión</th></tr></thead>";
            echo "<tbody><tr><td>Nombre completo: </td><td>".$_SESSION["nombre"]."</td></tr>";
            echo "<tr><td>Grupo: </td><td>".$_SESSION["apellidos"]."</td></tr>";
            echo "<tr><td>Fecha de nacimiento: </td><td>".$_SESSION["fechaNac"]."</td></tr>";
            echo "<tr><td>Correo electrónico: </td><td>".$_SESSION["correo"]."</td></tr></tbody>";
            echo "</table>";

            //En caso de que se quiera cerrar la cuenta, hay un botón que al presionarlo lo hará y redireccionará al usuario al formulario
            echo "<br><form action=\"index.php\" method=\"POST\"><input type=\"submit\" name=\"cerrarS\" value=\"cerrar sesión\"></form>";

            $cerrarS = isset($_POST["cerrarS"])? $_POST["cerrarS"] : "que wea?";
            if ($cerrarS === "cerrar sesión") {
                session_unset();
                session_destroy();
                header("location: form.php");
            }
        }
        


    ?>
</body>
</html>