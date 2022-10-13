<div class="titulos">Desafio Palindromo</div>

<?php
function palindromo($palavra)
{
    $ultimoIndice = strlen($palavra) - 1;
    for ($i = 0; $i <= $ultimoIndice; $i++) {
        if($palavra[$i] !== $palavra[$ultimoIndice - $i]){
            return 'Não';
        }
    }
    return 'Sim';
}

echo palindromo('arara') . "<br>";
echo palindromo('bola') . "<br>";
echo palindromo('ana') . "<br>";

echo "<hr>";

function palindromoNativaPhp($palavra){
    return $palavra === strrev($palavra) ? 'Sim' : 'Não';
}

echo palindromoNativaPhp('arara') . "<br>";
echo palindromoNativaPhp('bola') . "<br>";
echo palindromoNativaPhp('ana') . "<br>";

?>