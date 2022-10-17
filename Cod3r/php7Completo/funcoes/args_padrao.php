<div class="titulo">Argumentos Padrões</div>

<?php

function saudacoes($nome = "Senhor(a)", $sobreNome = "Cliente"){
    return "Bem Vindo(a), $nome $sobreNome.";
}

echo saudacoes("Rodolfo", "Freire Belo");

echo "<hr>";
function soma($a = 0, $b = 0){
    return $a + $b;
}

echo soma(2, 7);

echo "<hr>";
function pedido($sanduiche = "Misto", $bebida = "Água"){
    return "Seu sanduíche é $sanduiche e sua bebida é $bebida.";
}

echo pedido("Moela", "Cerveja");
?>