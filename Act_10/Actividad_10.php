<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // se declaran las variables
        // se conectan los resultados con el archivo php y se validan
        $nom = (isset($_POST["nom"]) && $_POST["nom"] !="") ?$_POST["nom"] : "No especificó";
        $AP = (isset($_POST["AP"]) && $_POST["AP"] !="") ?$_POST["AP"] : "No especificó";
        $AM = (isset($_POST["AM"]) && $_POST["AM"] !="") ?$_POST["AM"] : "No especificó";
        $sexo = (isset($_POST["sexo"]) && $_POST["sexo"] !="") ?$_POST["sexo"] : "No especificó";
        $edad = (isset($_POST["edad"]) && $_POST["edad"] !="") ?$_POST["edad"] : "No especificó";
        $CE = (isset($_POST["CE"]) && $_POST["CE"] !="") ?$_POST["CE"] : "No especificó";
        $tel = (isset($_POST["tel"]) && $_POST["tel"] !="") ?$_POST["tel"] : "No especificó";
        $cel = (isset($_POST["cel"]) && $_POST["cel"] !="") ?$_POST["cel"] : "No especificó";
        $esc = (isset($_POST["esc"]) && $_POST["esc"] !="") ?$_POST["esc"] : "No especificó";
        $prom = (isset($_POST["prom"]) && $_POST["prom"] !="") ?$_POST["prom"] : "No especificó";
        $PO = (isset($_POST["PO"]) && $_POST["PO"] !="") ?$_POST["PO"] : "No especificó";
        $SO = (isset($_POST["SO"]) && $_POST["SO"] !="") ?$_POST["SO"] : "No especificó";
    ?>
    <!-- Se forma la tabla en que se encuentran los resultados -->
    <table border="1" width="700" height="600" style="text-align: center">
        <thead>
            <tr>
                <th colspan="4">Solicitud de ingreso</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <!-- En las casillas donde cambia su contenido se imprimen las variables -->
                    <?php
                        echo $AP;
                    ?>
                </td>
                <td>
                    <?php
                        echo $AM;
                    ?>
                </td>
                <td colspan="2">
                    <?php
                        echo $nom;
                    ?>
                </td>
            </tr>
            <tr>
                <!-- las casillas sin cambios se hacen con html -->
                <td><strong><u>Apellido Paterno</u></strong></td>
                <td><strong><u>Apellido Materno</u></strong></td>
                <td colspan="2"><strong><u>Nombre (s)</u></strong></td>
            </tr>
            <tr>
                <td><strong><u>Sexo:</u></strong></td>
                <td>
                    <?php
                        echo $sexo;
                    ?>
                </td>
                <td><strong><u>Edad:</u></strong></td>
                <td>
                    <?php
                        echo $edad;
                    ?> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                        echo $CE;
                    ?>
                </td>
                <td>
                    <?php
                        echo $tel;
                    ?>
                </td>
                <td>
                    <?php
                        echo $cel;
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><strong><u>Correo electrónico</u></strong></td>
                <td><strong><u>Teléfono</u></strong></td>
                <td><strong><u>Celular</u></strong></td>
            </tr>
            <tr>
                <td><strong><u>Escuela de procedencia:</u></strong></td>
                <td>
                    <?php
                        echo $esc;
                    ?> 
                </td>
                <td><strong><u>Promedio:</u></strong></td>
                <td>
                    <?php
                        echo $prom;
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><strong><u>Primera opción</u></strong></td>
                <td colspan="2">
                    <?php
                        echo $PO;
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><strong><u>Segunda opción</u></strong></td>
                <td colspan="2">
                    <?php
                        echo $SO;
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>