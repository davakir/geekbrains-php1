<?php
require_once("functions/mysql_db_service.php");
session_start();
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_hash'])) {
        $last_page = $_COOKIE['last_page'];
        
        if ($last_page == "index" || !isset($_COOKIE['last_page'])) {
            setcookie('last_page', "index", time() + 60*3);
        }
        else {
            header('Location: ' . $last_page . '.php');
            exit();
        }
    }
    else {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8"/>
	<meta name="description" content="This is the main page of my site"/>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300,700&subset=latin,cyrillic,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'/>
</head>
<body>
	<div class="content">
		<ul class="main-menu">
			<li class="here">
				<h1><a href="index.php">Home</a></h1>
			</li>
			<li><a href="articles.php">Статьи</a></li>
			<li><a href="catalog.php">Каталог</a></li>
			<li><a href="gallery.php">Галерея изображений</a></li>
			<li><a href="register.php">Регистрация</a></li>
			<li><a href="contacts.php">Контакты</a></li>
			Hello,
			<span style="color: #ff7f50;"><?php
				$data = get_user_by_id($_COOKIE['user_id']);
				echo $data['user_login'];
			?></span>
		</ul>
		<section>
			<div class="welcome welcome-english">Welcome!</div>
			<div class="welcome welcome-german">Herzlich Willcommen!</div>
			<div class="welcome welcome-russian">Добро пожаловать!</div>
			<div class="welcome welcome-spanish">¡Bienvenidas!</div>
		</section>
	</div>
	<footer>
		All rights reserved &copy; 2015
	</footer>
</body>
</html>