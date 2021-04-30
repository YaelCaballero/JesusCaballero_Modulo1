<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero</title>
</head>
<body>
<table border="1">
    <?php
        // "z" representa el número de filas y columnas que tendrá la tabla
        $z = 8;
        // "blanco" es la variable que agrega la imagen de la celda blanca y "negro" la imagen de la celda negra
        $blanco = "<img src=\"blanco.jpg\" width=\"50\" height=\"50\"";
        $negro = "<img src=\"negro.jpg\" width=\"50\" height=\"50\"";
        // "primerCuadroFila" declara el color de la primera celda de la fila. 
        $primerCuadroFila = $blanco;
        // Forma el número de filas
        for($i=1; $i<=$z; $i++) {
            echo "<tr>";
            // Forma el número de celdas en cada fila
            for($j=1; $j<=$z; $j++) {
                echo "<td>";
                // Imprime el color de la primera celda de cada fila e intercala el color
                if($j==1) {
                    // La variable "cuadro" representa la celda en que se está
                    echo $cuadro = $primerCuadroFila;
                    $primerCuadroFila = $cuadro == $blanco ? $negro : $blanco;
                }
                // Imprime el color de las demás celdas, cambiando el color constantemente
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