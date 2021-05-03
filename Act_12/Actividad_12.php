<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>Traducción</title>
</head>
<body>
    <fieldset>
        <?php
            //Se conectan las respuestas del formulario y se garantiza que cada pregunta tenga una respuesta correspondiente 
            $trans = (isset($_POST["trans"]) && $_POST["trans"] !="") ?$_POST["trans"] : "No especificó";
            $texto = (isset($_POST["texto"]) && $_POST["texto"] !="") ?$_POST["texto"] : "No especificó";
            $texto = strtolower($texto);
            $letra = str_split($texto);
            //utlicé un arreglo porque así ordeno la letra del abecedario con su forma en morse
            $leng = ["a"=>".-","b"=>"-...","c"=>"-.-.","d"=>"-..","e"=>".",
                    "f"=>"..-.","g"=>"--.","h"=>"....","i"=>"..","j"=>".---",
                    "k"=>"-.-","l"=>".-..","m"=>"--","n"=>"-.","o"=>"---",
                    "p"=>".--.","q"=>"--.-","r"=>".-.","s"=>"...","t"=>"-",
                    "u"=>"..-","v"=>"...-","w"=>".--","x"=>"-..-","y"=>"-.--",
                    "z"=>"--..","!"=>"--..--","."=>".-.-.-",","=>"-.-.--",
                    "?"=>"..--..","\""=>".-..-.","1"=>".----","2"=>"..---",
                    "3"=>"...--","4"=>"....-","5"=>".....","6"=>"-....","7"=>"--...",
                    "8"=>"---..","9"=>"----.","0"=>"-----"];

            echo "<h3>Tu texto a traducir fue:</h3>";
            echo strtoupper($texto)."<br>";
            echo "<h3>La traducción es:</h3>";
            
            //Los if's los utilizo para que funjan como un filtro dependiendo la modalidad en la que se pide la traducción
            if ($trans === "espMor") {
                // los ord's sirven para identificar si lo que se está escribiendo ya está en el lenguaje al que se quiere traducir
                if ((ord($texto) === 45)||(ord($texto) === 46)) {
                    echo "Está utilizando el lenguaje al que se quiere traducir";
                } else {
                    foreach ($letra as $caracter) {
                        if ($caracter === " ") {
                            echo "/&nbsp;";
                        }
                        foreach ($leng as $caracLeng => $morse) {
                            /*En este caso, los ord's funcionan para que los números se tomen en cuenta para traducirlos. 
                            De no estar sólo los ignoraría y pasaría con los demás caracteres*/
                            if (ord($caracter) === ord($caracLeng)) {
                                echo $morse;
                                echo " ";
                            } 
                        }
                    }
                }
            //Los comentarios anteriores también cuentan aquí, pues es el mismo principio solo que al revés
            } elseif ($trans === "morEsp") {
                if (!((ord($texto) === 45)||(ord($texto) === 46))) {
                    echo "Está utilizando el lenguaje al que se quiere traducir";
                } else {
                    /*Utilicé explode para que me dividiera la cadena que llegaba por letra morse y no por caracter.
                    De esta forma es más sencillo comparar las letras morse que llegan con las guardadas en $leng*/ 
                    $letraMor = explode(" ", $texto);
                    foreach ($letraMor as $letraV) {
                        if ($letraV === "/") {
                            echo "/&nbsp;";
                        }
                        foreach ($leng as $caracLeng => $morse) {
                            if ($letraV === $morse) {
                                echo strtoupper($caracLeng);
                                echo " ";
                            }
                        }
                    }
                }
            }

        ?>
    </fieldset>
</body>
</html>