<?php
    $nome= $_POST["nome"]?? "";
    echo "<h1>Processar 3<h1>";
    echo "Olá, " .htmlspecialchars($nome). "! Este é o processamento 3.";
?>