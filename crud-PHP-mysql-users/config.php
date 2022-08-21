<?php

//host
$host = 'http://localhost:8080/';

//db
$db_name = '';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';

try {
    $conn = mysqli_connect($host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
    throw $th;
}
