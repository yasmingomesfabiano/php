<?php
    $nome= $_POST["nome"]?? "";
    /* ??: retorna o valor da esquerda se ele existir e não for nulo,
    se não retorna o valor da direita*/
    echo "<h1>Processar 1<h1>";
    echo "Nome recebido:" .htmlspecialchars($nome);
?>