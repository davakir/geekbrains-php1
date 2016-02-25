<?php
header("Content-type: text/html; charset=UTF-8");
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

function get_user($user_login) {
    $connection = connect() or die( "Unable to select database");
    $query = mysql_query("SELECT * FROM users WHERE user_login='" . mysql_real_escape_string($user_login) . "'", $connection);
    $data = mysql_fetch_assoc($query);
    mysql_close($connection);
    return $data;
}

function get_user_by_id($user_id) {
    $connection = connect() or die( "Unable to select database");
    $query = mysql_query("SELECT * FROM users WHERE user_id='" . mysql_real_escape_string($user_id) . "'", $connection);
    $data = mysql_fetch_assoc($query);
    mysql_close($connection);
    return $data;
}

function add_user($user_login, $user_password) {
    $connection = connect() or die( "Unable to select database");
    //echo mysql_errno($connection) . ": " . mysql_error($connection). "\n";
    $query = mysql_query("INSERT INTO users (user_login, user_password) VALUES ('".$user_login."', '".md5(md5($user_password))."')", $connection);
    mysql_close($connection);
    if (!$query) {
        return false;
    } 
    else return true;
}

function get_user_id($user_login) {
    $connection = connect() or die( "Unable to select database");
    $query = mysql_query("SELECT user_id FROM users WHERE user_login='" . mysql_real_escape_string($user_login) . "'", $connection);
    $data = mysql_fetch_assoc($query);
    mysql_close($connection);
    return $data['user_id'];
}

function update_user($user_id, $hash_str) {
    $connection = connect() or die( "Unable to select database");
    mysql_query("UPDATE users SET user_hash = '" . $hash_str . "' WHERE user_id = " . $user_id, $connection);
    mysql_close($connection);
}

?>