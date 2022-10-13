<div class="titulo">Desafio Tabela</div>

<?php

$matriz = [
    ['01', '02', '03', '04', '05'],
    ['06', '07', '08', '09', '10'],
    ['11', '12', '13', '14', '15'],
    ['16', '17', '18', '19', '20'],
];
?>
<table>
    <?php
    $cont = 0;
    $corPar = "corPar";
    $corImpar = "corImpar";
    $corFinal;
    foreach ($matriz as $linhas) {
        if ($cont % 2 == 0) {
            echo "<tr class=$corPar>";
        } else {
            echo "<tr class=$corImpar>";
        }
        foreach ($linhas as $valor) {
            echo "<td>$valor</td>";
            $cont++;
        }
        echo "</tr>";
    }
    ?>
</table>
<hr>

<style>
    table {
        border: 1px solid #444;
        border-collapse: collapse;
        margin: 20px 0px;
    }

    table tr {
        border: 1px solid #444;
    }

    table td {
        border: 1px solid #444;
        padding: 10px 20px;
    }

    .corPar {
        background-color: #808080;
    }

    .corImpar {
        background-color: #FFFFFF;
    }
</style>