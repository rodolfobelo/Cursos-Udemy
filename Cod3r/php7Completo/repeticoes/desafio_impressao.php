<div class="titulo">Desafio Impressão</div>



<?php

$array = [
    "AAA",
    "BBB",
    "CCC",
    "DDD",
    "EEE",
    "FFF"
];

echo "<h1>For</h1>";

for ($i = 0; $i < count($array); $i++) {
    // echo "$i";
    if ($i % 2 == 0) {
        echo "$array[$i]    ";
    }
    // echo "<br>";
}

echo "<hr>";

echo '<h1>Foreach</h1>';

foreach ($array as $key => $value) {
    if ($key % 2 == 0) {
        echo "$value    ";
    }
    // echo "<br>";

}

echo "<hr>";
echo "<hr>";

echo "<h1>For</h1>";

for ($i = 0; $i < count($array); $i++) {
    echo "$i";
    echo "$array[$i]    ";
}

echo "<hr>";

echo '<h1>Foreach</h1>';

foreach ($array as $key => $value) {
    echo $key;
    echo "$value    ";
}
