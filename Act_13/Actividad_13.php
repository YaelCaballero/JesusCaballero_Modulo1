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
        $coordX = (isset($_POST["coordX"]) && $_POST["coordX"] !="") ?$_POST["coordX"] : "@";
        $coordY = (isset($_POST["coordY"]) && $_POST["coordY"] !="") ?$_POST["coordY"] : "@";
        $barcos = (isset($_POST["barcosrec"]) && $_POST["barcosrec"] !="") ?$_POST["barcosrec"] : 0;
        $coordX = strtoupper($coordX);

        $z = 10;
        $mar = "<img src=\"mar.jpg\" width=\"50\" height=\"50\"";
        $noBarco = "<img src=\"noBarco.jpg\" width=\"50\" height=\"50\"";
        $barco = "<img src=\"Barco.jpg\" width=\"50\" height=\"50\"";

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
                } else {
                    echo $mar;
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<form action=\"Actividad_13.php\" method=\"POST\">";

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

        var_dump($barcos);

        echo "<form action='Actividad_13.php' method='post'>
        Posición x (Letra)<input type='text' name='coordX' required>
        Posición y (Número)<input type='text' name='coordY' required>
        <input type='submit' value='Disparar'>";
        
        foreach ($barcos as $coordenada) {
            echo "<input type=\"hidden\" name=\"barcosrec[]\" value=\"$coordenada\">";
        }

        echo "</form>";
    ?>
</body>
</html>