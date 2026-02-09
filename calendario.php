<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
    <style>
        body{
            text-align: center;
        }

        table{
            border-collapse: collapse;
            border-color: #880d1e;
            font-family: sans-serif;
            width: 50%;
            height: 50%;
            margin: 0 auto;
            
        }
        .hoje{
            background-color:#dd2d4a;
            font-weight: bold;
            color: white;
        }

        .fim-semana{
            color: #f26a8d;
            background-color: white;
        }
        .nav{
            margin-bottom: 10px;
        }

        .nav a{      
            color: #880d1e;
            text-decoration: none;
            font-size: 20px!important;
            
        }
        th {
            background: #dd2d4a;
            color: #fff;
            padding: 8px;
            border-color: #880d1e;
        }

        td {
            border: 1px solid #dd2d4a;
            padding: 10px;
            height: 40px;
        }
        h2{
            text-align: center;
            color: #dd2d4a;
            font-size: 50px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

    </style>
</head>
<body>

<?php 
    date_default_timezone_set('America/Sao_Paulo');
    $mesesNomes = [1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho',
    7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'];

    // Pegar mês e ano via URL (GET)
    $mesAtual = isset($_GET['mes']) ? (int)$_GET['mes'] : (int)date('m');
    $anoAtual = isset($_GET['ano']) ? (int)$_GET['ano'] : (int)date('Y');

    // Cálculos de data
    $dataString=sprintf('%04d-%02d-01', $anoAtual, $mesAtual);
    $dataAtual = strtotime($dataString); 
    $mesAnt = (int)date('m', strtotime('-1 month', $dataAtual));
    $anoAnt = (int)date('Y', strtotime('-1 month', $dataAtual));
    $mesProx = (int)date('m', strtotime('+1 month', $dataAtual));
    $anoProx = (int)date('Y', strtotime('+1 month', $dataAtual));

    $primeiroDiaSemana = (int)date('w', $dataAtual); // Onde o dia 1 cai (0=Dom, 1=Seg...)
    $diasNoMes = (int)date('t', $dataAtual);

    $diaHoje = (int)date('j');
    $mesHoje = (int)date('m');
    $anoHoje = (int)date('Y');
?>

<h2>Calendário: <?php echo $mesesNomes[$mesAtual] . " de " . $anoAtual; ?></h2>

<div class="nav">
    <a href="?mes=<?php echo $mesAnt; ?>&ano=<?php echo $anoAnt; ?>">Anterior</a> |   |
    <a href="?mes=<?php echo $mesProx; ?>&ano=<?php echo $anoProx; ?>">Próximo</a>
</div>

<table border="1">
    <thead>
        <tr>
            <th>Dom</th><th>Seg</th><th>Ter</th><th>Qua</th><th>Qui</th><th>Sex</th><th>Sáb</th>
        </tr>
    </thead>
    <tbody>
        <tr> <?php
            // 1. Preencher espaços vazios do início do mês
            for($i = 0; $i < $primeiroDiaSemana; $i++) {
                echo "<td></td>";
            }

            // 2. Preencher os dias do mês
            $diaCorrente = 1;
            while($diaCorrente <= $diasNoMes) {
                if(($primeiroDiaSemana + $diaCorrente - 1) % 7 == 0 && $diaCorrente != 1) {
                    echo "</tr><tr>";
                }

                $classes = [];
                if ($diaCorrente == $diaHoje && $mesAtual == $mesHoje && $anoAtual == $anoHoje) {
                    $classes[] = 'hoje';
                }
                
                $posicaoSemana = ($primeiroDiaSemana + $diaCorrente - 1) % 7;
                if ($posicaoSemana == 0 || $posicaoSemana == 6) {
                    $classes[] = 'fim-semana';
                }

                echo "<td class='" . implode(' ', $classes) . "'>$diaCorrente</td>";
                
                $diaCorrente++;
            }

            while (($primeiroDiaSemana + $diaCorrente - 1) % 7 != 0) {
                echo "<td></td>";
                $diaCorrente++;
            }
        ?>
        </tr> </tbody>
</table> 

</body>
</html>

