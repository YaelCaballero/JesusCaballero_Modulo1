<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 2 en 1</title>
</head>
<body>
    <?php
        //Se define la zona horaria al inicio del archivo para que pueda comparar las distintas zonas horarias con la nuestra
        date_default_timezone_set("America/Mexico_City");
        $ciudad = (isset($_POST["ciudad"]) && $_POST["ciudad"] !="") ?$_POST["ciudad"] : "No especificó";
        $horaCDMX = (isset($_POST["hora"]) && $_POST["hora"] !="") ?$_POST["hora"] : "No especificó";
        $preg = (isset($_POST["preg"]) && $_POST["preg"] !="") ?$_POST["preg"] : "No especificó";
        $cumple = (isset($_POST["cumple"]) && $_POST["cumple"] !="") ? $_POST["cumple"] : "No especificó";
        
        //Se utiliza este if para que no se active esta parte del código si el usuario no escogió ninguna de las opciones para el reloj mundial
        if ($ciudad !== "No especificó") {
            $ciudadZona = ["Nueva York" => "America/New_York","Sao Paulo" => "America/Sao_Paulo",
                            "Madrid" => "Europe/Madrid","París" => "Europe/Paris","Roma" => "Europe/Rome",
                            "Atenas" => "Europe/Athens", "Shanghai" => "Asia/Shanghai","Tokio" => "Asia/Tokyo"];
            
            if ($horaCDMX === $_POST["hora"]) {
                $horaCDMX = explode(":", $horaCDMX);
                /*Utilicé un arreglo para que separara la hora ingresada en hora y minuto. Después, en $horaIngresada, meto los valores del arreglo
                para que los tomen en cuenta las demás zonas horarias.*/
                $horaIngresada = mktime($horaCDMX[0], $horaCDMX[1]);    
            }
            echo "<table border='1' width='200' style='text-align: center;'>";
            echo "<tr><th colspan='2'>Reloj Mundial</th></tr>";
            /*Este foreach imprime las casillas suficientes para las zonas horarias que pidió el usuario. 
            El foreach anidado se encarga del nombre al lado de la hora en la tabla*/
            foreach ($ciudad as $zonaHoraria) {
                date_default_timezone_set($zonaHoraria);
                if ($horaCDMX === $_POST["hora"]) {
                    $hora = date("h:i A", $horaIngresada);
                } else {
                    $hora = date("h:i A");
                }
                echo "<tr>";
                foreach ($ciudadZona as $nombreC => $z) {
                    if ($zonaHoraria === $z) {
                        echo "<td>".$nombreC."</td>";
                    }
                }
                echo "<td>".$hora."</td>";
                echo "</tr>";
            }
        }

        //Se utiliza este if para que no se active esta parte del código si el usuario no escogió ninguna de las opciones para calcular un cumpleaños
        if ($cumple !== "No especificó" && $preg !== "No especificó") {
            /*las variables $cumpledia y $diaHoy seleccionan las fechas que limitan el lapso de tiempo: $cumpledia ubica el cumpleaños del usuario, mientras que
            $diaHoy marca la fecha y la hora del día en que se está calculando*/
            $cumpledia = localtime(strtotime($cumple), true);
            $diaHoy = localtime(time(), true);

            /*$diaHoy y $diacumple guardan el dias de cada fecha (cumpleaños y el día actual) para que después se resten sus valores dando como resultado los días
            restantes para el cumpleaños del usuario*/
            $dHoy = $diaHoy["tm_yday"];
            $diacumple = $cumpledia["tm_yday"];
            $diasrest = $diacumple - $dHoy;                    
            if ($diasrest <= 0) {
                $diasrest += 365; 
            }
            echo "<table border='1' width='300' style='text-align: center;'>";
            echo "<tr><th colspan='2'>Calculadora de cumpleaños</th></tr>";
            echo "<tr><th>Próximo cumpleaños</th>";
            echo "<th>".$cumple."</th></tr>";
            
            foreach ($preg as $pregunta) {
                /*Cada if se activa dependiendo el checkbox que se prenda. Para ello, se utiliza el foreach que busca cada valor de las ckeckboxes y los if's los
                comparan para encenderse*/
                if ($pregunta === "p1") {
                    echo "<tr>"; 
                    echo "<td>Días que faltan</td>";
                    echo "<td>".$diasrest."</td>";
                    echo "</tr>";
                }
                if ($pregunta === "p2") {
                    echo "<tr>"; 
                    echo "<td>Horas que faltan</td>";
                    /*$horasrest utiliza $diasrest y lo multiplica por 24 para representar las horas de los días. Además se le resta las horas que se
                    van actualizando gracias al localtime de $diaHoy. $minutosrest, más abajo en el código, funciona de la misma forma*/
                    $horasrest = $diasrest*24;
                    $horasrest -= $diaHoy["tm_hour"];
                    echo "<td>".$horasrest."</td>";
                    echo "</tr>";
                }
                if ($pregunta === "p3") {
                    echo "<tr>"; 
                    echo "<td>Minutos que faltan</td>";
                    $horasrest = $diasrest*24;
                    $horasrest -= $diaHoy["tm_hour"];
                    $minutosrest = $horasrest*60;
                    $minutosrest -= $diaHoy["tm_min"];
                    echo "<td>".$minutosrest."</td>";
                    echo "</tr>";
                }
                if ($pregunta === "p4") {
                    echo "<tr>"; 
                    echo "<td>¿Será fin de semana?</td>";
                    /*Este if se utiliza para saber si el día del cumpleaños cae en fin de semana*/
                    if ($cumpledia["tm_wday"] === 0 || $cumpledia["tm_wday"] === 6) {
                        echo "<td>sí</td></tr>";
                    } else {
                        echo "<td>no</td></tr>";
                    }
                }
            }
        }
    ?>
</body>
</html>