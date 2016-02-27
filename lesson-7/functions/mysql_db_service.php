<?php
header("Content-type: text/html; charset=UTF-8");

// function connect($db_name = "test") {
//     $host = "localhost:3306";
//     $user = "root";
//     $password = "p1010942342";
//     $connection = mysqli_connect($host, $user, $password, $db_name);
//     if (!$connection) {
//         die('Не удалось подключиться к базе:' . mysqli_connect_error());
//     }
//     return $connection;
// }    

function connect($db_name = "test") {
    $mysql_host = "localhost:3306";
    $mysql_login = "root";
    $mysql_pass = "p1010942342";
    $connection = mysql_connect($mysql_host, $mysql_login, $mysql_pass);
    $db_selected = mysql_select_db($db_name, $connection);
    if (!$db_selected) {
        die ('Не удалось выбрать базу foo: ' . mysql_error());
    }
    
    //TODO: разобраться с обработкой ошибок
    //echo mysql_errno($connection) . ": " . mysql_error($connection). "\n";
    return $connection;
}

?>