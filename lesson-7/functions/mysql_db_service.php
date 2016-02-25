<?php
header("Content-type: text/html; charset=UTF-8");

function connect($db_name = "test") {
    $host = "localhost:3306";
    $user = "root";
    $password = "p1010942342";
    $connection = mysqli_connect($host, $user, $password, $db_name);
    if (!$connection) {
        die('Не удалось подключиться к базе:' . mysqli_connect_error());
    }
    return $connection;
}    

function connect_close() {
    
}

?>