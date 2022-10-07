<div class="titulo">Foreach</div>

<?php
$semana = [1 => "Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];


foreach ($semana as $dias) {
    echo "$dias <br>";
}

echo "<hr>";

foreach ($semana as $key => $value) {
    echo "$key => $value <br>";
}

echo "<hr>";

$matrix = [
    ["Rodolfo", "Belo"],
    ["Yara", "Belo"],
    ["José Igor", "Belo"],
    ["Icaro", "Belo"]
];

echo
"<table border=10px>
  <tr>
    <th>Nome</th>
    <th>Sobrenome</th>
  </tr>";
foreach ($matrix as $linha) {
    echo "<tr>";
    foreach ($linha as $letra) {
        echo "<td>$letra</td>";
    }
    echo "</tr>";
}
echo "</table>";



?>