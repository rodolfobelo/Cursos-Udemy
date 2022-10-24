<div class="titulo">Primeira Classe</div>

<?php

class Cliente{
    public $nome = "Rodolfo";
    public $idade = 30;

    function apresentar(){
        echo "Nome: {$this->nome} - Idade {$this->idade}";
    }

    
}

$C1 = new Cliente();
$C1->nome = "Rodolfo Freire Belo";
$C1->idade = 35;
$C1->apresentar();

?>