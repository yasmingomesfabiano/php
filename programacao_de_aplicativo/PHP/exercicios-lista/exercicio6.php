<?php
    if(isset($_GET["text"])){
        $text= trim($_GET["text"]);
        $verificar=substr($text, 0, 1);
        $segunda = strtoupper(substr($text, 1, 1));
        $resto = substr($text, 2);
        $nomeCorrigido = $verificar . $segunda . $resto;

        if($verificar == "A"){
            echo "Nome vip: ".$nomeCorrigido;
        }elseif($verificar != "A"){
            echo "Nome comum: ".$nomeCorrigido;
        }else{
            echo $nomeCorrigido;
        }
    }
?>