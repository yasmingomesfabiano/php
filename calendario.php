<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
</head>
<body>
    <h2>Calendário: <?php echo date('F Y')?></h2>
    <div class="nav">
        <a href="?mes<=php echo $mesAnt; ?>&ano=<?php echo $anoAnt;?>"><-Anterior</a>
    </div>
    <table>
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
        
            $primeiroDia = date('w', strtotime(''));
            $diaMes= date('t');
            $dia= 1;
            if ($primeiroDia > 0){
                echo '<tr<td colspan="'.$primeiroDia .'"></td>';
            }
            for ($i = $primeiroDia; $i < 42; $i++){
                if($i % 7 == 0) echo '</tr><tr>';
                if($dia <= $diaMes){
                    $classe= ($dia == date('j')) ? 'hoje': '';
                    echo "<td class=' $classe'> $dia </td>";
                    $dia++;
                }else{
                    echo '<td> </td>';
                }
            }
        ?>
    </table>
    
</body>
</html>