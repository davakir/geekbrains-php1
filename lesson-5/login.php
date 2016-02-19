<?php
/**
 * Created by PhpStorm.
 * User: davakir
 * Date: 18.02.16
 * Time: 17:56
 */
 if (isset($_POST['name']) && isset($_POST['password'])) {
    $logValue = $_POST['name'];
    $passValue = $_POST['password'];
    var_dump($_POST);
    setcookie("login", $logValue, time() + 86400*31);
    setcookie("password", $passValue, time() + 86400*31);
    var_dump($_COOKIE['login']);
 }
 



?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="coolProject/css/form.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method="POST">
    <h2>Заполните форму</h2>
    <input type="text" name="name" placeholder="Ваше имя...">
    <input type="password" name="password" placeholder="Пароль...">
    <input type="submit" class="btn" value="Отправить">
    <input type="reset" class="btn" value="Очистить форму">
    <input type="checkbox" id="remember">
    <label for="remember">Запомнить меня</label>
</form>
</body>
</html>
