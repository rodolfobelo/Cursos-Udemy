<div class="titulos">Argumentos Variáveis</div>

<?php
function soma($a, $b){
    return $a + $b;
}

function somaCompleta(...$numeros){
    return array_sum($numeros);
}

echo somaCompleta(1,1,1,1,1) . "<br>";
echo "<hr>";
function membros($titular, ...$dependentes){
    echo "Titular: $titular <br>";
    if($dependentes){
        foreach($dependentes as $dep){
            echo "Dependentes: $dep. <br>";
        }        
    }
}

membros("Rodolfo Freire Belo", 
        "Yara Azevedo de Matos Belo", 
        "José Igor Azevedo Belo", 
        "Ícaro Azevedo Belo");