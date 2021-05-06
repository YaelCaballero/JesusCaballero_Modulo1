<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalla naval</title>
</head>
<body>

    <?php
        echo "<h1>Batalla naval: el barco (no) se hundirá</h1>";
        echo "Historial de disparos:<br><br>";
        $mar = "<img src=\"mar.jpg\" width=\"50\" height=\"50\">";
        $noBarco = "<img src=\"noBarco.png\" width=\"50\" height=\"50\">";
        $barco = "<img src=\"Barco.png\" width=\"50\" height=\"50\">";
        $corazon = "<img src=\"corazon.png\" width=\"50\" height=\"50\">";
        $coordX = (isset($_POST["coordX"]) && $_POST["coordX"] !="") ?$_POST["coordX"] : "@";
        $coordY = (isset($_POST["coordY"]) && $_POST["coordY"] !="") ?$_POST["coordY"] : "@";
        $barcos = (isset($_POST["barcosrec"]) && $_POST["barcosrec"] !="") ?$_POST["barcosrec"] : 0;
        $coordC = (isset($_POST["coordCrec"]) && $_POST["coordCrec"] !="") ?$_POST["coordCrec"] : 0;
        $coordX = strtoupper($coordX);
        $atino1 = false;
        $atino = false;
        $gano = false;
        $perdio = false;
        $jugadas = isset($_POST["veces"])?$_POST["veces"]+1:0;
        $i=1;
        $nom2="cordes".$i;
        if(isset($_POST["$nom2"])) {
            while(isset($_POST["$nom2"])) {
                $arr_coords[$i] = $_POST["$nom2"];
                $i++;
                $nom2 = "cordes".$i;
            }
        }       

        //De acuerdo a la existencia de las coordenadas enviadas o no, se recupera las variables para usarlas después
        if(isset($_POST["coordX"]) && isset($_POST["coordY"]) && $jugadas > 0) {
            $coordX = $_POST["coordX"];
            $coordY = $_POST["coordY"];
            $coord = $coordX.$coordY;
            $coord = strtoupper($coord);
            $arr_coords[$jugadas] = $coord;
            $vidas = $_POST["vida"];
        //En caso de no haber enviado aún algo del formulario, empieza con 10 vidas y una variable que lleva el control de si se ha atinado al menos en una ocasión
        } elseif ($jugadas === 0) {
            $vidas = 10;
            $atino1 = false;
        } elseif ($jugadas === 1) {
            $vidas--;
        }
        //Muestra historial de disparos
        if($jugadas >= 1) {
            $atino1 = $_POST["siatino"];
            foreach($arr_coords as $key => $value) {
                echo strtoupper($value);
                if($jugadas > 1)
                    echo ", ";
            }
            //Lleva control de si se ha atinado o no
            foreach($barcos as $key => $value) {
                if($value == strtoupper($coord))
                    $atino = true;
                    $atino1 = true;
            }
            //Reduce vidas
            if ($atino == false) {
                $vidas--;
            }
            //Caso que modifica el arreglo para llevar una cuenta por si ganas
            for($i=0; $i < count($barcos); $i++) {
                if($barcos[$i] == strtoupper($coord)) {
                    $barcos[$i] = 0;
                }
            }
            $cuenta = 0;
            //Ciclo que cuenta cuantas llevas acertadas para saber si ganas
            foreach($barcos as $llave => $valor) {
                if($valor === 0 || $valor === "0") {
                    $cuenta++;
                }
            }
            //Condiciones de ganar o perder
            $gano = $cuenta == count($barcos)?true:false;
            $perdio=$vidas < 1?true:false;
            if ($gano == true) {
                echo "<h1>Ganaste</h1>";
            }
            if ($perdio == true) {
                echo "<h1>Perdiste</h1>";
            }
        }
        //Impresión de corazones
        echo "<h3>Vidas:</h3><table><tr>";
        for($i=0; $i<$vidas; $i++) {
         echo "<th>".$corazon."</th>";
        }
        echo "</tr></table><br><br>";
        $valoresX = ["A","B","C","D","E","F","G","H","I","J"];
        $valoresY = ["1","2","3","4","5","6","7","8","9","10"];

        if (!(isset($_POST["barcosrec"]))) {
            /*Este do...while impide el choque de los barcos. Se utiliza un array_intersect para que detecte si en los arreglos hay un valor compartido para impedir el
            choque*/
            do {
                $barco3 = [];
                $barco4 = [];
                    /*Se utilizan dos estructuras iterativas do...while para que se garantice la aparición de los barcos. Si no se encuentra alguno de los barcos
                    se repite hasta que se hallen ambos*/
                    do {
                        $cabezaX = rand(0,9);
                        $cabezaY = rand(0,9);
                        $vueltas = 0;

                        /*Se utilizan dos estructuras condicionales para que, en el caso de que los barcos aparezcan totalmente o parcialmente afuera del tablero,
                        buscara otro sitio donde generarse en la orientación opuesta, así hasta que se tenga una posición en el tablero. Esta parte se trata del barco de 4 celdas*/
                        if ($cabezaY+5 <= 9) {
                            foreach ($valoresX as $numL => $letra) {
                                if ($cabezaX === $numL) {
                                    $lol = $letra;
                                }
                            }
                            foreach ($valoresY as $numN => $numero) {
                                if ($cabezaY === $numN) {
                                    while ($vueltas !== 4) {
                                        $vueltas++;
                                        $numero++;
                                        $barco4Cuerpo = $lol.$numero;
                                        array_push($barco4, $barco4Cuerpo);
                                    }
                                }
                            }
                        } elseif ($cabezaX+5 <= 9) {
                            foreach ($valoresY as $numN => $numero) {
                                if ($cabezaY === $numN) {
                                    $lol = $numero;
                                }
                            }
                            foreach ($valoresX as $numL => $letra) {
                                if ($cabezaX === $numL) {
                                    $letra = ord($letra);
                                    while ($vueltas !== 4) {
                                        $vueltas++;
                                        $letra++;
                                        $barco4Cuerpo = chr($letra).$lol;
                                        array_push($barco4, $barco4Cuerpo);
                                    }
                                }
                            }
                        }
                    } while ($cabezaY > 4 && $cabezaX > 4);
                    do {
                        $cabezaX = rand(0,9);
                        $cabezaY = rand(0,9);
                        $vueltas = 0;

                        /*Se utilizan dos estructuras condicionales para que, en el caso de que los barcos aparezcan totalmente o parcialmente afuera del tablero,
                        buscara otro sitio donde generarse en la orientación opuesta, así hasta que se tenga una posición en el tablero. Esta parte se trata del barco de 3 celdas*/
                        if ($cabezaX+6 <= 9) {
                            foreach ($valoresY as $numN => $numero) {
                                if ($cabezaY === $numN) {
                                    $lol = $numero;
                                }
                            }
                            foreach ($valoresX as $numL => $letra) {
                                if ($cabezaX === $numL) {
                                    $letra = ord($letra);
                                    while ($vueltas !== 3) {
                                        $vueltas++;
                                        $letra++;
                                        $barco3Cuerpo = chr($letra).$lol;
                                        array_push($barco3, $barco3Cuerpo);
                                    }
                                }
                            }
                        } elseif ($cabezaY+6 <= 9) {
                            foreach ($valoresX as $numL => $letra) {
                                if ($cabezaX === $numL) {
                                    $lol = $letra;
                                }
                            }
                            foreach ($valoresY as $numN => $numero) {
                                if ($cabezaY === $numN) {
                                    while ($vueltas !== 3) {
                                        $vueltas++;
                                        $numero++;
                                        $barco3Cuerpo = $lol.$numero;
                                        array_push($barco3, $barco3Cuerpo);
                                    }
                                }
                            }
                        }
                    } while ($cabezaY > 3 && $cabezaX > 3);  
                    $XD = array_intersect($barco3, $barco4);

            }while (array_key_exists(0, $XD));
            $barcos = array_merge($barco3, $barco4);
        }
    //Se guarda los valores de los barcos en $coordC para después utilizarlo a la hora de imprimir las fotos del tablero comparando el historial con dicha
    if ($jugadas === 0) {
        $coordC = $barcos;
    }

    echo "<table>";

    $z = 10;

    echo "<table border=\"1\" style=\"text-align: center\">";
    /*La tabla imprime primero las coordenadas que se encuentran a sus costados. Posteriormente se le colocan las fotos con ayuda de unos arreglos que
    representan las coordenadas X y las coordenadas Y ($valoresX y $valoresY)*/
    for($i=0; $i<=$z; $i++) {
            echo "<tr>";
        for($j=0; $j<=$z; $j++) {
            echo "<td>";
            if (($i == 0)&&($j == 0)) {
                echo "&nbsp;";
            } elseif ($j == 0) {
                echo $i;
            } elseif ($i == 0) {
                $x = $j+96;
                $x = chr($x);
                $xU = strtoupper($x);
                echo $xU;
            } elseif ($atino === true && (strtoupper($coordX) == $valoresX[$j-1] && $coordY == $valoresY[$i-1])) {
                echo $barco;
            } elseif ($atino === false && (strtoupper($coordX) == $valoresX[$j-1] && $coordY == $valoresY[$i-1])) {
                echo $noBarco;
            } else {
                $prueba = true;
                if ($atino1) {
                    foreach($arr_coords as $key => $value) {
                        foreach ($coordC as $key2 => $value2) {
                            if ($value == $value2) {
                                if ($value2 == $valoresX[$j-1].$valoresY[$i-1]) {
                                    echo $barco;
                                    $prueba = false;
                                }
                            }
                        }
                    }
                }
                if ($prueba) {
                    echo $mar;
                }        
            }
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    /*Este echo se encarga del formulario que permite al usuario disparar. También se utiliza para guardar datos después del disparo, 
    de no estar aquí (los hiddens) al disparar se borrarían los barcos hundidos, los disparos fallidos y las vidas*/
    echo "<form action='Actividad_13.php' method='post'>
            Posición x (Letra)<input type='text' name='coordX' required>
            Posición y (Número)<input type='text' name='coordY' required>
            <input type='submit' value='Disparar'>
            <input type='hidden' value='$vidas' name='vida'>
            <input type='hidden' value='$atino1' name='siatino'>
            <input type='hidden' value='$jugadas' name='veces'>";
    //Estructura que dependiendo de si ya se envío al menos una vez el formulario, guarda los valores del historial de disparos
    if($jugadas >= 1) {
        for($i=1;$i<=count($arr_coords);$i++) {
            $nom = "cordes".$i;
            echo "<input type='hidden' value='$arr_coords[$i]' name='$nom'>";
        }
    }
    //Estructura que envía valores de coordenadas modificadas para conteo de perdido
    foreach ($barcos as $coordenada) {
        echo "<input type=\"hidden\" name=\"barcosrec[]\" value=\"$coordenada\">";
    }
    //Estructura que envía los valores del arreglo con los valores de coordenadas de los barcos
    foreach ($coordC as $coordCV) {
        echo "<input type=\"hidden\" name=\"coordCrec[]\" value=\"$coordCV\">";
    }

    echo "</form>";
    ?>
</body>
</html>