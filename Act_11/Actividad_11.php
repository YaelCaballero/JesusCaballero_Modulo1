<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php 
        //Se conectan las respuestas del formulario y se garantiza que cada pregunta tenga una respuesta correspondiente 
        $p1 = (isset($_POST["p1"]) && $_POST["p1"] !="") ?$_POST["p1"] : "No especificó";
        $p2 = (isset($_POST["p2"]) && $_POST["p2"] !="") ?$_POST["p2"] : "No especificó";
        $p3 = (isset($_POST["p3"]) && $_POST["p3"] !="") ?$_POST["p3"] : "No especificó";
        $p4 = (isset($_POST["p4"]) && $_POST["p4"] !="") ?$_POST["p4"] : "No especificó";
        $p5 = (isset($_POST["p5"]) && $_POST["p5"] !="") ?$_POST["p5"] : "No especificó";
        $p6 = (isset($_POST["p6"]) && $_POST["p6"] !="") ?$_POST["p6"] : "No especificó";
        $p7 = (isset($_POST["p7"]) && $_POST["p7"] !="") ?$_POST["p7"] : "No especificó";
        $p8 = (isset($_POST["p8"]) && $_POST["p8"] !="") ?$_POST["p8"] : "No especificó";
        $p9 = (isset($_POST["p9"]) && $_POST["p9"] !="") ?$_POST["p9"] : "No especificó";
        $pX = (isset($_POST["pX"]) && $_POST["pX"] !="") ?$_POST["pX"] : "No especificó";

        $respuestas = [$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $pX];
        $cadResp = implode("", $respuestas);
        //Utilicé count_chars() para facilitar la organización de las respuestas. Da el caracter y la cantidad de veces que se ve en la cadena
        $letraCant = count_chars($cadResp, 1);
        arsort($letraCant);
        $resultados = "";
        $puntajeAlto = 0;
        $ciclos = 0;
        $eresTaco = "Eres un taco";
        /*Se utiliza un foreach porque se necesita ordenar las respuestas del formulario con el propósito de saber que opción
        fue la más usada y si hay un posible empate.*/ 
        foreach ($letraCant as $Letra => $Cant) {
            $ciclos++;
            $Letra = chr($Letra);
            if ($ciclos == 1) {
                $resultados.=$Letra.",";
                $puntajeAlto = $Cant;
            } elseif ($Cant == $puntajeAlto) {
                $resultados.=$Letra.","; 
            }
            if ($ciclos == 3) {
                break;
            }
        }
        /*Después de ordenarlo, se forma una string de los resultados, sin embargo deben ser organizados alfabeticamente
         para que no se tenga que cuidar el orden de los resultados en un empate.*/
        $resDesordenado = explode(",", $resultados);
        array_pop($resDesordenado);
        sort($resDesordenado);
        $resOrdenada = implode("", $resDesordenado);
        /*Se utiliza un switch para que, dependiendo la cadena resultante, tenga una posible respuesta. Al ya estar ordenadas
        alfabeticamente ya no habrá problemas entre empates del estilo "AB" y "BA"*/
        switch ($resOrdenada) {
            case 'A':
                echo $eresTaco." al pastor";
                break;
            
            case 'B':
                echo $eresTaco." de suadero";
                break;

            case 'C':
                echo $eresTaco." de barbacoa";
                break;
            
            case 'D':
                echo $eresTaco." lagunero";
                break;

            case 'AB':
                echo $eresTaco." campechano";
                break;
    
            
            case 'BC':
                echo $eresTaco." de carnitas";
                break;

            case 'CD':
                echo $eresTaco." bell";
                break;

            case 'AD':
                echo $eresTaco." light";
                break;

            case 'AC':
                echo $eresTaco." placero";
                break;

            case 'BD':
                echo $eresTaco." de mixiote";
                break;

            default:
                echo $eresTaco." de sal";
                break;
        }
    ?>
</body>
</html>