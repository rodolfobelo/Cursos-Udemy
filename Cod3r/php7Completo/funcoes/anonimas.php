<div class="titulos">Funções Anônimas</div>


<?php

$soma = function ($a, $b) {
    return $a + $b;
};

$subtracao = function ($a, $b) {
    return $a - $b;
};
function soma ($a, $b) {
    return $a + $b;
};

function subtracao ($a, $b) {
    return $a - $b;
};

echo $soma(1, 2) . "<br>";

function executar($a, $b, $op, $funcao)
{
    $resultado = $funcao($a, $b);
    echo "$a $op $b = $resultado<br>";
}

executar(2, 2, '+', $soma);
echo "<hr>";


function executarVarias($a, $b, $funcao)
{

    echo "$a $b = $funcao($a, $b)<br>";
}

executarVarias(2, 2, $soma);
echo "<hr>";


function executarOp($a, $b, $op)
{
    if ($op == '+') {
        $resultado = soma($a, $b);
    }
    else if ($op == '-') {
        $resultado = subtracao($a, $b);
    }
    echo "$a $op $b = $resultado<br>";
}

executarOp(5, 3, '+');

?>