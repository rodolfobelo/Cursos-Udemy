<div class="titulo">Primeira Classe</div>

<?php

class Cliente{
    public $nome = "Rodolfo";
    public $idade = 35;

    function apresentar(){
        echo "Nome: {$this->nome} - Idade {$this->idade}";
    }

    $C1 = new Cliente();
}

?>