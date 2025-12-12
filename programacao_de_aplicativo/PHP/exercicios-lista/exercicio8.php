<?php
    if(isset($_GET["cpf"])){
        $cpf= $_GET["cpf"];
        if (strlen($cpf) == 11) {

            $cpfFormatado = substr($cpf, 0, 3) . "." .
                            substr($cpf, 3, 3) . "." .
                            substr($cpf, 6, 3) . "-" .
                            substr($cpf, 9, 2);
    
            echo "CPF formatado: " . $cpfFormatado;
    
        } else {
            echo "CPF inválido. Digite exatamente 11 números.";
        }
    }

?>