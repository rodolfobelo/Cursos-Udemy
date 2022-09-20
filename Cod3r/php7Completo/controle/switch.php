<div class="titulo">Switch</div>

<?php

$categoria = 'Sedn';
$carro;
$preco;

switch (strtolower($categoria)) {
    case 'Luxo':
        $carro = 'Mercedes';
        $preco = 250000;
        break;
    case 'SUV':
        $carro = 'Duster';
        $preco = 150000;
        break;
    case 'Sedan':
        $carro = 'City';
        $preco = 120000;
        break;
    default:
        $carro = 'Mobi';
        $preco = 55000;
        break;
}

$precoFormatado = number_format($preco, 2, ',', '.');
echo "<p>Carro: $carro. <br>Preço: r$ $precoFormatado.";
?>