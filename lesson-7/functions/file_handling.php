<?php
require_once("mysql_db_service.php");
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 23.02.2016
 * Time: 12:26
 */

function is_valid_file($file) {
    $err = "";
    if ($file['type'] == "image/gif" || $file['type'] == "image/jpeg" || $file['type'] == "image/pjpeg" || $file['type'] == "image/png") {
        if ($file['size'] < 5242881) {
        }
        else $err = "Размер файла не должен превышать 5 МБ";
    }
    else $err = "Неверный формат файла";
    return $err;
}

function insert_into_db($file) {
    $conn = connect();
    $name = $file['name'];
    $size = $file['size'];
    $img_arr = explode('.', $name); //массив имени и расширения
    //возвращаемые имя и расширение
    $name = md5($img_arr[0]);
    $ext = $img_arr[1];
    mysql_query("INSERT INTO images (name, extension, size, time_seen) values ('".$name."','". $ext ."',". $size .", 0)", $conn);
    return $name;
}

function change_location($tmp_name, $img_name) {
    return rename($tmp_name, "uploads/" . $img_name);
}
?>