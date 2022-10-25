<div class="titulo">Desafio Data</div>

<?php
class Data{

    public $day = "01";
    public $month = "01";
    public $year = "1970";

    function apresentar(){
        echo "$this->day/$this->month/$this->year";
    }
}


$d1 = new Data();

$d1->day="25";
$d1->month="01";
$d1->year="1987";
$d1->apresentar();