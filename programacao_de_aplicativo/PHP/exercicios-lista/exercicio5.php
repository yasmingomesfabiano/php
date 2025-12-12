<?php
    if(isset($_GET["senha"])){
        $senha= $_GET["senha"];
        $status= " ";
        $tamanho= strlen($senha);
        $temNumero = preg_match('/\d/', $senha);          
        $temEspecial = preg_match('/[@#$%¨&*(){}?]/', $senha);

        if($tamanho < 8){
            echo "sua senha é fraca";
        }elseif($temEspecial){
            echo "sua senha é média";
        }else{
            echo "sua senha é forte";
        }
    }
?>