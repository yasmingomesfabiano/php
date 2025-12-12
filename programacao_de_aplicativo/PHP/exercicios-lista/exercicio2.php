<?php
if (isset($_GET["email"])) {
    $email = $_GET["email"];

    if (substr($email, -10) == "@gmail.com") {
        echo "Seu email termina com @gmail.com";
    } elseif (substr($email, -12) == "@hotmail.com") {
        echo "Seu email termina com @hotmail.com";
    } else {
        echo "Não foi reconhecido pelo sistema";
    }
}
?>