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
</body>
</html>