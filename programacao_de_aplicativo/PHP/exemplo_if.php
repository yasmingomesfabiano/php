<?php
    $seuqncia= "A,B,C,D,E,F,G";
    $elementos= explode(",", $sequencia);
    $a= 10;
    $b= 10;

    if($a > $b){
        echo "A variável a é maior que a variável b";
    }
    elseif($b > $a){
        echo "A variável b é maior que a variável a";
    }
    elseif($b == $a){
        echo "As variáveis a e b possuem o mesmo valor";
    }

?>