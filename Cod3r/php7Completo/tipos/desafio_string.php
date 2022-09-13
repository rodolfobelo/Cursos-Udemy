<div class="titulo">Desafio String</div>

<?php


$str = '!AbcaBcabc';
$str_procurar = 'abc';

echo stripos($str, $str_procurar);

if (strpos($str, $str_procurar) !== false){
    echo '<br> '. 1;
}