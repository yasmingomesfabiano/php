<?php
    if(isset($_GET["text"])){
        $text=$_GET["text"];

        if($text < 18){
            echo "você tem ".$text. "anos, você é menor de idade";
        }elseif($text < 65 ){
            echo "você tem ".$text. "anos, você é adulto";
        }else{
            echo "você tem ".$text. "anos, você é idoso";
        }
    }

?>