<div class="titulo">Função & Escopo</div>


<?php
function imprimirMensagens(){
    echo "Hello!!";
};
// imprimirMensagens();

$variavel = 1;

function trocaValores(){
    $variavel = 2;
    echo "Durante a execução da function, variavel será $variavel.<br>";
};

function trocaValoresDeVerdade(){
    global $variavel;
    $variavel = 3;
    echo "Durante a execução da function, variavel será $variavel.<br>";
};



echo "Variavel antes da function trocaValores $variavel.<br>";
trocaValores();
echo "Variavel depois da function trocaValores $variavel.<br>";
echo "<hr>";
echo "Variavel antes da function trocaValoresDeVerdade $variavel.<br>";
trocaValoresDeVerdade();
echo "Variavel depois da function trocaValoresDeVerdade $variavel.<br>";


?>