<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
</head>
<body>
    <?php 

        $mesesNomes = [1=>'Janeiro', 2=>'Fevereiro', 3=>'Março', 4=>'Abril', 5=>'Maio', 6=>'Junho', 7=>'Julho',
        8=>'Agosto', 9=>'Setembro', 10=>'Outubro', 11=>'Novembro', 12=> 'Dezembro'];
        //Parâmetros GET com valores padrão (mês/ano atual)
        $mesAtual = isset($_GET['mes']) ? (int)$_GET['mes']: (int)date('m');
        //?: operador ternário - condição ? valor_SE_VERDADEIRO: valor_SE_FALSO
        //isset: verifica se o parâmetro existe
        $anoAtual = isset($_GET['ano']) ? (int)$_GET['ano']: (int)date('Y');

        //Cálculo para navegação
        $dataAtual = strtotime("{$anoAtual}-{$mesAtual}-01"); 
        $mesAnt = date('m', strtotime('-1 month', $dataAtual));
        $anoAnt = date('Y', strtotime('-1 month', $dataAtual));
        $mesProx = date('m', strtotime('+1 month', $dataAtual));
        $anoProx = date('Y', strtotime('+1 month', $dataAtual));

        //Primeiro dia e dias do mês
        $primeiroDiaSemana = (int)date('w', $dataAtual);
        $diasNoMes = (int)date('t', $dataAtual);

        $diaHoje = (int)date('j');
        $anoHoje = (int)date('Y');
        $mesHoje = (int)date('m');
        ?>
    <h2>Calendário: <?php echo $mesesNomes[(int)$mesAtual]. ;?></h2>

    <div class="nav">
        <a href="?mes=<?php echo $mesAnt; ?>&ano=<?php echo $anoAnt; ?>"><-Anterior</a>
        <a href="?mes=<?php echo $mesProx; ?>&ano=<?php echo $anoProx; ?>">Próximo -></a>
    </div>
    <table border="1">
        <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sáb</th>
        </tr>
        
        <?php
            for($i = 0; $i <$primeiroDiaSemana; $i++){
            //1. Prencher dos espaços vazios até o primeiro dia da semana
                echo "<td></td>";
            }

            //2. Preencher os dias do mês
            $diaCorrente = 1;
            while($diaCorrente <= $diasNoMes){
                //se for domingo(0) e não for o primeiro dia do mês, abre nova linha
                if(($primeiroDiaSemana + $diaCorrente -1) %7 ==0 && $diaCorrente !=1){ //operador AND
                    echo "</tr><tr>";
                }
                //etiquetas - diferenciação
                $classes = [];
                if ($diaCorrente == $diaHoje && $mesAtual == $mesHoje && $anoAtual == $anoHoje){
                    $classes[]= 'hoje';
                }
                $posicaoSemana = ($primeiroDiaSemana + $diaCorrente - 1) % 7;
                if ($posicaoSemana == 0 || $posicaoSemana == 6){
                    $classes[]= 'fim-semana';
                }

                echo "<td class='".implode(' ', $classes) . "'>$diaCorrente </td>";
                $diaCorrente++;
            }

            while (($primeiroDiaSemana + $diaCorrente - 1)%7 !=0){
                echo "<td></td>";
                $diaCorrente++;
            }
        ?>
    </table> 
</body>
</html>