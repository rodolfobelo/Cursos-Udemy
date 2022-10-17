<div class="titulo">Usando Tipos</div>

<?php

function somar1($a = 0, $b = 0){
    echo "<span>Somando $a + $b = </span>";
    return $a + $b;
}

echo somar1(3, "2dois") . "<br>";
echo somar1(3, "2");

echo "<hr>";

function somar2(int $a = 0, int $b = 0){
    echo "<span>Somando $a + $b = </span>";
    return $a + $b;
}

echo somar2(3, "2") . "<br>";
echo somar2(3, '4');

echo "<hr>";

function somar3($a = 0, $b = 0) : int {
    echo "<span>Somando $a + $b = </span>";
    return $a + $b;
}

echo somar3(3.2, 2.7) . "<br>";
echo somar3(3.2, '4dois');

echo "<hr>";

?>