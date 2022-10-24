<div class="titulo">Desafio Recursão</div>

<?php


$array1 = [1, 2, [3, 4, 5], 6, [7, [8, 9]], 10];

function imprimiArray($array, $nivel = '>'){
    foreach($array as $elemento){
        // if(is_array($elemento)){
        //     imprimiArray($elemento, $nivel . $nivel[0]);
        // }else {
        //     echo "$nivel $elemento<br>";
        // }
        if(is_array($elemento)){
            echo $elemento . "aqui <br>";
        }
        echo "$nivel $elemento <br>";
    }
}

imprimiArray($array1);
echo "<br>";
// imprimiArray($array1, '%');

?>