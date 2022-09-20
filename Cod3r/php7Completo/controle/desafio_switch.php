<style>
    form>* {
        font-size: 1.8rem;
        border-radius: 10px;
    }
</style>

<div class="titulo">Desafio Switch</div>

<form action="#" method="POST">
    <input type="text" name="param">
    <select name="conversao" id="conversao">
        <option value="km-milha">Km > Milha</option>
        <option value="milha-km">Milha > Km</option>
        <option value="metro-km">Metro > Km</option>
        <option value="km-metro">Km > Metro</option>
    </select>
    <button>Calcular</button>
</form>

<?php

$param = number_format($_POST['param'], 2, ',', '.');
$conversao = $_POST['conversao'];
const FATOR_KM_MILHA = 1.609;
const FATOR_METRO_KM = 1000;

$convertido;

switch($conversao){
    case 'km-milha':
        $convertido = number_format($param / FATOR_KM_MILHA, 2, ',', '.');
        $mensagem = "$param km(s) = $convertido milha(s).";
        break;
    case 'milha-km':
        $convertido = number_format($param * FATOR_KM_MILHA, 2, ',', '.');
        $mensagem = "$param milha(s) = $convertido km(s).";
        break;
    case 'metro-km':
        $convertido = number_format($param / FATOR_METRO_KM, 2, ',', '.');
        $mensagem = "$param metro(s) = $convertido km(s).";
        break;
    case 'km-metro':
        $convertido = number_format($param * FATOR_METRO_KM, 2, ',', '.');
        $mensagem = "$param km(s) = $convertido metro(s).";
        break;
    default:
        $mensagem = "Nenhum valor calculado!";
}
// number_format()
// echo "$param <br> $conversao <br> " . number_format($convertido, 2, ',', '.');
echo $mensagem;
?>

