<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
</head>
<body>

    <?php

        /*Se utilizan estas dos variables para que, cuando se le notifique al usuario de la subida exitosa de su archivo, al aceptar dicho
        aviso este mismo se quite y permita una impresión limpia de la tabla de las pinturas*/
        $botonIng = isset($_POST["Si"]) ?$_POST["Si"] : "qué wea?";
        $Galeria = isset($_POST["Si"]) && ($_POST["viendoG"] === "galeriaAbierta")? "galeriaAbierta": "galeriaCerrada";

        //Aquí se garantiza que lo que se suba no tenga valor ninguno. En caso de que el usuario no meta algún valor, esta parte le asignará que dato no se tiene (ej. sin fecha)
        $nombre = (isset($_POST["nombre"]) && $_POST["nombre"] !="") ?$_POST["nombre"] : "Sin nombre";
        $autor = (isset($_POST["autor"]) && $_POST["autor"] !="") ?$_POST["autor"] : "Sin autor";
        $año = (isset($_POST["año"]) && $_POST["año"] !="") ?$_POST["año"] : "Sin fecha";
        $archivoIng = (isset($_FILES["archivo"]) && $_FILES["archivo"] !="") ?$_FILES["archivo"] : "No especificó";
        //Este if garantiza que los archivos que se suban sean únicamente tipos de archivos que se requieren. No aceptará que se le suba un PDF o un Docsx
        if (isset($_FILES['archivo']) && ($_FILES['archivo']['type'] === 'image/jpg' || $_FILES['archivo']['type'] === 'image/jpeg' || $_FILES['archivo']['type'] === 'image/png')) {    
            //$nombrecomp se utiliza para que se unan los datos ingresados por el usuario y así sea más fácil renombrar los archivos
            $nombreComp = $nombre."$".$autor."$&".$año."&";
            $name = $_FILES["archivo"]["name"];
            //Aquí se renombran los archivos y los cambia de sitio
            $archivonom = rename($_FILES['archivo']['tmp_name'], "./statics/".$nombreComp.".".pathinfo($name, PATHINFO_EXTENSION)); 
        } elseif (isset($_FILES['archivo']) && !($_FILES['archivo']['type'] === 'image/jpg' || $_FILES['archivo']['type'] === 'image/jpeg' || $_FILES['archivo']['type'] === 'image/png')) {
            echo "<h1>El tipo de archivo no es el adecuado</h1>";
            echo "<form action=\"Actividad_15.html\" method=\"POST\">
                <input type=\"submit\" value=\"Ingresar una pintura\"></form>";
        }

        $carpeta = opendir("statics");

        $archivosImpr = array();
        $hayarchivos = true; 
        while($hayarchivos) {
            /*Aquí se inspeccionan todos los archivos que tenga la carpeta y guarda sus nombres en un arreglo para que sea más fácil su impresión en la tabla.
            También cuida que no se tomen en cuenta las rutas ("." o "..") para que no se desface la impresión*/
            $archivosCarpeta = readdir($carpeta);
            if ($archivosCarpeta !== false) {
                if ($archivosCarpeta != "." && $archivosCarpeta != "..") {
                    array_push($archivosImpr, $archivosCarpeta);
                }
            } else {
                $hayarchivos = false;
            }
        }

        /*Esta sección se encarga de la impresión de los archivos junto con sus datos. Primero cuida que la carpeta donde se encuentran los archivos no esté vacía
        y que ya se haya pasado el aviso de que el archivo se subió adecuadamente*/
        if ($botonIng === "Ver galería" && !(empty($archivosImpr))) {
            echo "<h1>Bienvenido a la galería</h1>";
            echo "<table border=\"1\" width=\"750\" style=\"margin: 0 auto; border-collapse:separate;\"><tr>";
            foreach ($archivosImpr as $key => $value) {
                //Posteriormente saca los datos de cada imagen por medio del nombre del archivo que fue formado por lo ingresado en el formulario
                echo "<td><img width='300' src=\"statics/$value\">";
                $nombrecompA = explode("$", $value);
                $nombreA = $nombrecompA[0];
                $autorA = $nombrecompA[1];
                $añocomp = explode("&", $value);
                $añoA = $añocomp[1];

                //Finalmente cada bloque (imagen, nombre, autor y fecha) es impreso por el foreach que recorre el arreglo $archivosImpr.
                echo "<ul>";
                echo "<li><strong>Nombre de la obra: </strong>".$nombreA."</li>";
                echo "<li><strong>Nombre del pintor: </strong>".$autorA."</li>";
                echo "<li><strong>Año en que se realizó: </strong>".$añoA."</li>";
                echo "</ul>";

                //Este if se encarga de distribuir los bloque en filas de dos celdas
                if ($key === 1 || $key % 2 === 1) {
                    echo "</tr><tr>";
                }
            }
            echo "</table>";
            echo "<br><form action=\"Actividad_15.html\" method=\"POST\">
            <input type=\"submit\" value=\"Ingresar otra pintura\"></form>";
        }

        /*Estos tres if's guardan tres notificaciones parar el usuario según la situación. El primero avisa que tanto el archivo como los datos de dicho
        hayan sido subidos sin inconvenientes*/
        if ($Galeria === "galeriaCerrada" && !(empty($archivosImpr)) && (isset($_POST["año"]) || isset($_POST["autor"]) || isset($_POST["nombre"])) && ($_FILES['archivo']['type'] === 'image/jpg' || $_FILES['archivo']['type'] === 'image/jpeg' || $_FILES['archivo']['type'] === 'image/png')) {
            echo "<form action=\"Actividad_15.php\" method=\"POST\">
            <h1>La obra se ha subido correctamente</h1>
            <input type=\"submit\" name=\"Si\" value=\"Ver galería\">
            <input type=\"hidden\" name=\"viendoG\" value=\"galeriaAbierta\">
            </form>";
        }

        /*El segundo se encarga de advertir al usuario de que no se ha subido nada en ningún momento, por lo que no hay nada que imprimir,
        y le pide que regrese al formulario para subir una pintura*/
        if (empty($archivosImpr)) {
            echo "<h1>Primero tiene que ingresar una pintura a la galería</h1>";
            echo "<form action=\"Actividad_15.html\" method=\"POST\">
                <input type=\"submit\" value=\"Ingresar una pintura\"></form>";
        }

        //El último le pregunta al usuario que si, desde la archivo php (sin haber subido nada en el formulario), quisiera ver las obras ya subidas
        if ($Galeria === "galeriaCerrada" && !(empty($archivosImpr)) && !(isset($_POST["año"]) && isset($_POST["autor"]) && isset($_POST["nombre"]))) {
            echo "<form action=\"Actividad_15.php\" method=\"POST\">
            <h1>¿Desea ver las piezas de arte ingresadas?</h1>
            <input type=\"submit\" name=\"Si\" value=\"Ver galería\">
            <input type=\"hidden\" name=\"viendoG\" value=\"galeriaAbierta\">
            </form>";
        }

        closedir($carpeta);
    ?>
</body>
</html>