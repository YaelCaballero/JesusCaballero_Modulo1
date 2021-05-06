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
        echo "<h1>Sacando el barco a flote</h1>";
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

        if(isset($_POST["coordX"]) && isset($_POST["coordY"]) && $jugadas > 0) {
            $coordX = $_POST["coordX"];
            $coordY = $_POST["coordY"];
            $coord = $coordX.$coordY;
            $coord = strtoupper($coord);
            $arr_coords[$jugadas] = $coord;
            $vidas = $_POST["vida"];
        } elseif ($jugadas === 0) {
            $vidas = 10;
            $atino1 = false;
        } elseif ($jugadas === 1) {
            $vidas--;
        }

        if($jugadas >= 1) {
            $atino1 = $_POST["siatino"];
            foreach($arr_coords as $key => $value) {
                echo strtoupper($value);
                if($jugadas > 1)
                    echo ", ";
            }
            
            foreach($barcos as $key => $value) {
                if($value == strtoupper($coord))
                    $atino = true;
                    $atino1 = true;
            }

            if ($atino == false) {
                $vidas--;
            }

            echo $atino;
            for($i=0; $i < count($barcos); $i++) {
                if($barcos[$i] == strtoupper($coord)) {
                    $barcos[$i] = 0;
                }
            }
            $cuenta = 0;

            foreach($barcos as $llave => $valor) {
                if($valor === 0 || $valor === "0") {
                    $cuenta++;
                }
            }
            $gano = $cuenta == count($barcos)?true:false;
            $perdio=$vidas < 1?true:false;
            if ($gano == true) {
                echo "<h1>Ganaste</h1>";
            }
            if ($perdio == true) {
                echo "<h1>Perdiste</h1>";
            }
        }
        echo "<h3>Vidas:</h3><table><tr>";
        for($i=0; $i<$vidas; $i++) {
         echo "<th>".$corazon."</th>";
        }
        echo "</tr></table><br><br>";
        $valoresX = ["A","B","C","D","E","F","G","H","I","J"];
        $valoresY = ["1","2","3","4","5","6","7","8","9","10"];

        if (!(isset($_POST["barcosrec"]))) {
            do {
                $barco3 = [];
                $barco4 = [];
                    do {
                        $cabezaX = rand(0,9);
                        $cabezaY = rand(0,9);
                        $vueltas = 0;

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
                        echo $cabezaX."<br>";
                        echo $cabezaY."<br>";

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
    if ($jugadas === 0) {
        $coordC = $barcos;
    }

        echo "<table>";

        $z = 10;

        echo "<table border=\"1\" style=\"text-align: center\">";
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
                        foreach($arr_coords as $key => $value)
                        {
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

        echo "<form action='Actividad_13.php' method='post'>
            Posición x (Letra)<input type='text' name='coordX' required>
            Posición y (Número)<input type='text' name='coordY' required>
            <input type='submit' value='Disparar'>
            <input type='hidden' value='$vidas' name='vida'>
            <input type='hidden' value='$atino1' name='siatino'>
            <input type='hidden' value='$jugadas' name='veces'>";
            if($jugadas >= 1)
            {
                for($i=1;$i<=count($arr_coords);$i++)
                {
                    $nom = "cordes".$i;
                    echo "<input type='hidden' value='$arr_coords[$i]' name='$nom'>";
                }
            }
   
        foreach ($barcos as $coordenada) {
            echo "<input type=\"hidden\" name=\"barcosrec[]\" value=\"$coordenada\">";
        }
        foreach ($coordC as $coordCV) {
            echo "<input type=\"hidden\" name=\"coordCrec[]\" value=\"$coordCV\">";
        }

        echo "</form>";
    ?>
</body>
</html>