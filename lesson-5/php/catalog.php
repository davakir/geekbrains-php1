<?php
	require_once("functions/check.php");
	require_once("functions/mysql_db_service.php");
	session_start();
	is_login("catalog");
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
		<li>
			<h1><a href="index.php">Home</a></h1>
		</li>
		<li><a href="articles.php">Статьи</a></li>
		<li class="here"><a href="catalog.php">Каталог</a></li>
		<li><a href="gallery.php">Галерея изображений</a></li>
		<li><a href="register.php">Регистрация</a></li>
		<li><a href="contacts.php">Контакты</a></li>
		Hello,<span style="color: #ff7f50;">
			<?php
				$data = get_user_by_id($_COOKIE['user_id']);
				echo $data['user_login'];
			?>
		</span>
	</ul>
	<section>
		<h1 class="themes">Темы наших статей</h1>
		<ul class="outside-list">
			<li>Политика
				<ul class="inside-list">
					<li>Внутренняя</li>
					<li>Внешняя</li>
					<li>Иммиграционная</li>
				</ul>
			</li>
			<li>Экономика
				<ul class="inside-list">
					<li>Банки</li>
					<li>Личное хозяйство</li>
					<li>Предпринимательство</li>
				</ul>
			</li>
			<li>Здоровье
				<ul class="inside-list">
					<li>Методы лечения</li>
					<li>Распространенные заболевания</li>
					<li>Медицинские исследования</li>
				</ul>
			</li>
			<li>Путешествия
				<ul class="inside-list">
					<li>Свадебные путешествия</li>
					<li>Экзотический туризм</li>
					<li>Популярные страны</li>
				</ul>
			</li>
		</ul>
	</section>
	</div>
	<footer>
		All rights reserved &copy; 2015
	</footer>
	
</body>
</html>