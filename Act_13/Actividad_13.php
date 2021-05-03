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
        $z = 11;
        $mar = "<img src=\"mar.jpg\" width=\"50\" height=\"50\"";
        for($i=1; $i<=$z; $i++) {
                echo "<tr>";
            for($j=1; $j<=$z; $j++) {
                echo "<td>";
                echo $mar;
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>