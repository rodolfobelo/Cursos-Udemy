<div class="titulo">Recursividade</div>

<?php

function somaUmAte($numero)
{
    $soma = 0;
    for ($i = 1; $i <= $numero; $i++) {
        $soma += $i;
    }
    return $soma;
}

echo somaUmAte(3);

?>