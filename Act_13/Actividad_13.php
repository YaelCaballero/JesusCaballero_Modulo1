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
        if(isset($_POST["pos_x"]) && isset($_POST["pos_y"]))
        {
            $vidas = $_POST["vida"];
            $vidas--;
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
        echo "</tr></table><br><br><table>"; 
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
            Posición x (Letra)<input type='text' name='pos_x' required>
            Posición y (Letra)<input type='text' name='pos_y' required>
            <input type='submit' value='Disparar'>
            <input type='hidden' value='$vidas' name='vida'></form>";
    ?>
    </table>
</body>
</html>