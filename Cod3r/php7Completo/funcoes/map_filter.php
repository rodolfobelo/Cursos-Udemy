<div class="titulo">Map & Filter</div>

<?php

$notas1 = [5.8, 7.3, 9.8, 6.7];

$notasFinais2 = array_map('round', $notas1);

print_r($notasFinais2);

echo '<hr>';

?>

<form action="#" method="post">
    <input type="text" name="n1">
    <input type="text" name="n2">
    <input type="text" name="n3">
    <input type="text" name="n4">

    <button>Calcular</button>
</form>



<style>
    form >* {
        font-size: 1.8rem;
    }
</style>

<?php

$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$n3 = $_POST['n3'];
$n4 = $_POST['n4'];

function retornoNotas($n1, $n2, $n3, $n4)
{
    $notas = [$n1, $n2, $n3, $n4];
    // $notas = [5.8, 7.3, 9.8, 6.7];
    $notasFinais = [];

    foreach ($notas as $nota) {
        $notaSFinais[] = round($nota);
    }

    print_r($notaSFinais);
}

retornoNotas($n1, $n2, $n3, $n4);

function aprovados($nota){
    return $nota > 7;
}

