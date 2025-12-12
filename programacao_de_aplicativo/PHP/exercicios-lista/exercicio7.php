<?php
    if(isset($_GET["text"])){
        $text=trim($_GET["text"]);
        $verificar= substr($text, 5, 3);
        $verificar_letra=substr($text, -3);
        $frase = "Produto: " . $verificar . "-" . $verificar_letra;

        if ($verificar > 200) {
        echo $frase . " - Premium";
        } else {
            echo $frase . " - Padrão";
        }
    }
?>