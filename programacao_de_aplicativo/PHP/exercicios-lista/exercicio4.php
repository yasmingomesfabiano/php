<?php
if (isset($_GET["text"])) {

    $text = trim($_GET["text"]);
    $palavras = explode(" ", $text);

    // pega as 3 primeiras
    
    if (count($palavras) >= 3) {
        $resultado= " ";
        $tresPrimeiras = array_slice($palavras, 0, 3);
        // pega as 3 primeiras letras e coloca em maiúsculas
        foreach ($tresPrimeiras as $p) {
            $resultado .= strtoupper(substr($p, 0, 3)); 
        }
        echo $resultado;

    } else {
        echo "Erro";
    }
}
?>