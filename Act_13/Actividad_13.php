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
        $z = 10;
        $mar = "<img src=\"mar.jpg\" width=\"50\" height=\"50\"";
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
    ?>
    </table>
</body>
</html>