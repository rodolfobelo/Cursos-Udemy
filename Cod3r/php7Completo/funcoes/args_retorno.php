<div class="titulo">Argumentos & Retorno</div>

<?php
function obterMensagem(){
    return "Seja Bem Vindo!!";
}
$obterMensagem = obterMensagem();

function obterMensagemComParametro($nome){
    return "Seja bem vindo, $nome!";
}
$menParam = obterMensagemComParametro('Rodolfo');
echo "$menParam <br>";


function soma ($a, $b){
    return $a + $b;
}

echo soma(3, 2);
?>

