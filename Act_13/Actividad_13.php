<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
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
                echo "<tr>";
            for($j=1; $j<=$z; $j++) {
                echo "<td>";
                echo $mar;
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