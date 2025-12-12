
<?php
    $nome= isset($_GET['nome']) ? trim($_GET['nome']): 'Usuário';
    //só vai aceitar variáveis que não sejam nulas
    //?: if/else em uma só linha
    //trim: tira espaço
    if (strlen($nome) > 5){
        $saudacao= "Olá, sr./sra." .ucfirst($nome); //ucfirst: converte a primaira letra em maiusculo
    }else{
        $saudacao= "Olá, " .ucfirst($nome);
    }

    echo $saudacao . "\n\n";

    echo "Digite o seu nome: \n";
    echo "Nome: ";
    $handle= fopen("php://stdin", "r"); //fopen: abre arquivo  ||stdin: entrada padrão do teclado
    //r: read- modo de leitura
    $nome= trim(fgets($handle)); //fgets- lê uma linha do teclado até o usuário dar enter
    //handle- conecta o programa ao arquivo/teclado
    fclose($handle);

    echo $saudacao;
?>