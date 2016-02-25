<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 22.02.2016
 * Time: 22:13
 */

$file = fopen('../lesson-5/users/users.txt', 'r');
$content = file_get_contents($file);
fclose($file);
echo "<pre>";
print_r($content);
echo "</pre>";
?>