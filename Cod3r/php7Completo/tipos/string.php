<div class="titulo">Tipo String</div>


<?php

echo strlen('teste'), '<br>';
echo strlen('eu também'), '<br>';
// echo mb_strlen('eu também', 'utf-8'); //função não disponível nativa pelo php


// concatenação

echo 'Nós também '.' somos';
echo '<br>', "Também", ' aceito';


print "<br> aceito";


// Algumas funções
echo '<br>', strtoupper('maiusculo');
echo '<br>', strtolower('MINUSCULO');
echo '<br>'. ucfirst('só primeira letra maiscula');
echo '<br>'. ucwords('toda primeira letra maiscula');
echo '<br>'. substr('Uma parte', 4, 5);

