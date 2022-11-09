<?php

require_once(dirname(__FILE__, 2) . '/src/config/Database.php');

Database::getConnection();

$var = "2, 3, 5";

$sql = "select * from users where id in ( $var )";
$result = Database::getResultFromQuery($sql);

while ($row = $result->fetch_assoc()){
    print_r($row);
    echo '<br>';
}