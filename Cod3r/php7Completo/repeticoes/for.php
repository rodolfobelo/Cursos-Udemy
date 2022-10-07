<div class="titulo">Laço For</div>

<?php
for ($i=1; $i <= 5; $i++) { 
    echo "$i <br>";
}

echo "<hr>";

$semana = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira"];

for ($i=0; $i < count($semana); $i++) { 
    echo "$i - $semana[$i] <br>";
}

$array = [['a', 'e', 'i', 'o', 'u'],
        ['b', 'c', 'd']];
        
for ($i=0; $i < count($array); $i++) { 
    # code...
}