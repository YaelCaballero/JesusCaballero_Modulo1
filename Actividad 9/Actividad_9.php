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
    // la mayor parte de las variables que se utilizarán
    // "z" representa el número de filas y columnas que tendrá la tabla
        $z = 8;
    // "blanco" es la variable que agrega la imagen de la celda blanca y "negro" la imagen de la celda negra
        $blanco = "<img src=\"blanco.jpg\" width=\"50\" height=\"50\"";
        $negro = "<img src=\"negro.jpg\" width=\"50\" height=\"50\"";
    // "primerCuadroFila" declara el color de la primera celda de la fila. 
    // En un inicio es blanca, respetando el orden de las celdas en los tableros del ajedrez
        $primerCuadroFila = $blanco;
    // Esta estructura de control iterativa forma el número de filas. Empieza desde la fila una hasta "z"
        for($i=1; $i<=$z; $i++) {
            echo "<tr>";
    // Esta estructura de control iterativa anidada forma el número de celdas en cada fila. Comienza desde la celda uno hasta "z"
            for($j=1; $j<=$z; $j++) {
                echo "<td>";
    // Esta estructura de control condicional imprime el color de la primera celda de cada fila, intercalando el color
                if($j==1) {
    // Se introduce la variable "cuadro" que representa la celda en que se está
                    echo $cuadro = $primerCuadroFila;
                    $primerCuadroFila = $cuadro == $blanco ? $negro : $blanco;
                }
    // Esta estructura de control condicional imprime el color de las demás celdas, cambiando el color constantemente
                else {
                    echo $cuadro = $cuadro == $negro ? $blanco : $negro;
                }
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>