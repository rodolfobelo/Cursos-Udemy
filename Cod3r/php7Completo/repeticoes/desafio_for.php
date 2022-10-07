<div class="titulo">Desafio For</div>

<?php
for ($i = 0; $i < 5; $i++) {
    $ras = $ras . "#";
    echo "$ras <br>";
}
echo "<hr>";

for ($ras2='#'; $ras2 !=='######' ; $ras2.='#') { 
    echo $ras2 . "<br>";
}
?>