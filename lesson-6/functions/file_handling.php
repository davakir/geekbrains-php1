<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 23.02.2016
 * Time: 12:26
 */

function change_location($tmp_name, $file_name) {
    return rename($tmp_name, "uploads/" . $file_name);
}

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
?>