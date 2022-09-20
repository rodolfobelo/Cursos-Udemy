<style>
    button,
    select {
        font-size: 1.8rem;
        border-radius: 10px;
        text-align: center;
    }
</style>

<div class="titulo">Desafio Operadores lógicos</div>

<!-- Dois Trabalhos -> terça e quinta!
-- Se os dois forem executados -> TV 50' e Sorvete
-- Se apenas um for executado -> TV 32' e Sorvete
-- Se nenhum for executado -> Fica em casa mais saudável! -->

<form action="" method="post">

    <div>
        <label for="t1">Trabalho 1 (Terça-Feira):</label>
        <select name="t1" id="t1">
            <option value="1">Executado</option>
            <option value="0">Não Executado</option>
        </select>
    </div>
    <div>
        <label for="t2">Trabalho 2 (Quinta-Feira):</label>
        <select name="t2" id="t2">
            <option value="1">Executado</option>
            <option value="0">Não Executado</option>
        </select>
    </div>
    <button>Executar</button>
</form>

<?php
$t1 = $_POST['t1'];
$t2 = $_POST['t2'];

$tv;
$sorvete = false;
$resultado;

if ($t1 == 1 && $t2 == 1) {
    $tv = "50'";
    $sorvete = "true";
} else if ($t1 == 0 && $t2 == 1) {
    $tv = "32'";
    $sorvete = true;
} else if ($t1 == 1 || $t2 == 1) {
    $tv = "32'";
    $sorvete = true;
}
else {
    $tv = "";
    $sorvete = false;
}

if($tv) {
    $resultado = "Vamos comprar TV de " . $tv . "!!";
} else {
    $resultado = "Infelizmente não é hj q vai sair a TV :(!!";
}

if(!$sorvete){
    $resultado .= '<br> Estamos mais saudaveis em casa!!';
}else {
    $resultado .= '<br> E depois vamos tomar sorvete \o/!';
}


echo $resultado;
?>