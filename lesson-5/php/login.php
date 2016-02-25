<?php
require_once 'functions/mysql_db_service.php';
session_start();
// unset($_SESSION['user_id']);
// exit;
// print_r($_SESSION);
$err = array();

//генерируем hash-строку
function hash_gen($length) {
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    $alph_len = strlen($alphabet) - 1;
    //собственно генерируем строку
    while (strlen($str) < $length) {
        $str .= $alphabet[mt_rand(0, $alph_len)];
    }
    return $str;
}
//задаем cookie
function set_cookie($data) {
    //задаем cookie с уникальным идентификатором польз-ля
    setcookie('user_id', $data['user_id'], time() + 60*5);
    
    //задаем cookie с хэш-строкой польз-ля
    $hash_str = hash_gen(10);
    update_user($data['user_id'], $hash_str);
    setcookie('user_hash', $hash_str, time() + 60*5);
    header('Location: index.php');
    exit();
}

//проверяем, была ли нажата кнопка Отправить
if (isset($_POST['submit'])) {
    $data = get_user($_POST['login']);
    if ($data == false) {
        $err[] = "Такого пользователя в базе нет, зарегистрируйтесь или введите логин/пароль заново";
    }
    else {
        if ($data['user_password'] == md5(md5($_POST['password']))) {
            set_cookie($data);
        }
        else {
            $err[] = "Неверно введенный пароль";
        }
    }
}

//если польз-ль перенаправлен со страницы регистрации
if (isset($_SESSION['user_id'])) {
    $data = get_user_by_id($_SESSION['user_id']);
    unset($_SESSION['user_id']);
    set_cookie($data);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<form action="" method="POST">
    <h2>Заполните форму</h2>
    <?php
        if ($err) {
            foreach ($err as $item) {
                echo "<p class=\"error\">$item</p>";
            }
        }
    ?>
    <input type="text" name="login" placeholder="Ваш логин..">
    <input type="password" name="password" placeholder="Пароль..">
    <input type="submit" class="btn" name="submit" value="Отправить">
    <input type="reset" class="btn" value="Очистить форму">
    <input type="checkbox" id="remember">
    <label for="remember">Запомнить меня</label>
    <br/><br/>
    <p>У меня нет учетной записи, хочу <a href="register.php">зарегистрироваться</a></p>
</form>
</body>
</html>