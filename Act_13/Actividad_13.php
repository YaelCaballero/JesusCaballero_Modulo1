<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalla naval</title>
</head>
<body>
    <form action="Actividad_13.php" method="POST">
        <label>
            <input type="text" name="coordX" placeholder="A-J">
        </label>
        <label>
            <input type="text" name="coordY" placeholder="1-10">
        </label>
        <input type="submit" value="disparar">
    </form>
    <table border="1" style="text-align: center">
    <?php
        $jugadas = isset($_POST["veces"])?$_POST["veces"]+1:0;
        $i=1;
        $nom2="cordes".$i;
        if(isset($_POST["$nom2"]))
        {
            while(isset($_POST["$nom2"]))
            {
                $arr_coords[$i] = $_POST["$nom2"];
                $i++;
                $nom2 = "cordes".$i;
            }
        }    
        if(isset($_POST["coordX"]) && isset($_POST["coordY"]) && $jugadas > 0)
        {
            $coordX = $_POST["coordX"];
            $coordY = $_POST["coordY"];
            $coord = $coordX.$coordY;
       //     array_push($arr_coords, $coord);
            $arr_coords[$jugadas] = $coord;
            $vidas = $_POST["vida"];
            $vidas--;
            var_dump($arr_coords);
        }  
        else
        {
            $vidas = 10;
        }
        $z = 11;
        $mar = "<img src='.\mar.jpg' width='50' height='50\'";
        echo "<h1>Batalla naval</h1><br><br>";
        echo "<h3>Vidas:</h3><table><tr>";
        for($i=0; $i<$vidas; $i++)    
        {
         echo "<th><img src='.\corazon.png' width='70' height='70'</th>";
        } 
        echo "</tr></table><br><br>"; 
        echo "Historial de disparos:<br><br>";
        if($jugadas >= 1)
        {
            foreach($arr_coords as $key => $value)
            {
                echo $value;
                if($jugadas > 1)
                    echo ", ";
            }
        }
        echo "<table>";
        for($i=1; $i<=$z; $i++)
         {
        $coordX = (isset($_POST["coordX"]) && $_POST["coordX"] !="") ?$_POST["coordX"] : "No especificó";
        $coordY = (isset($_POST["coordY"]) && $_POST["coordY"] !="") ?$_POST["coordY"] : "No especificó";
        $coordX = strtoupper($coordX);
        $coordenadas = [$coordX => $coordY];
        var_dump($coordenadas);

        $valoresX = ["A","B","C","D","E","F","G","H","I","J"];
        $valoresY = [1,2,3,4,5,6,7,8,9,10];

        $cabezaX = rand(0,9);
        $cabezaY = rand(0,9);
        $vueltas = 0;
        echo $cabezaY."<br>";
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
                        echo $lol.$numero;
                    }
                }
            }
        }

        $z = 10;
        $mar = "<img src=\"mar.jpg\" width=\"50\" height=\"50\"";
        $noBarco = "<img src=\"noBarco.jpg\" width=\"50\" height=\"50\"";
        $barco = "<img src=\"Barco.jpg\" width=\"50\" height=\"50\"";
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
        echo "</table><br><br>";
        echo "<form action='Actividad_13.php' method='post'>
            Posición x (Letra)<input type='text' name='coordX' required>
            Posición y (Número)<input type='text' name='coordY' required>
            <input type='submit' value='Disparar'>
            <input type='hidden' value='$vidas' name='vida'>
            <input type='hidden' value='$jugadas' name='veces'>";
            if($jugadas >= 1)
            {
                for($i=1;$i<=count($arr_coords);$i++)
                {
                    $nom = "cordes".$i;
                    echo "<input type='hidden' value='$arr_coords[$i]' name='$nom'>";
                }
            }
            echo "</form>";
    ?>
    </table>
</body>
</html>