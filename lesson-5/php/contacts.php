<?php
	require_once("functions/check.php");
	require_once("functions/mysql_db_service.php");
	session_start();
	is_login("contacts");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8"/>
	<meta name="description" content="This is the main page of my site"/>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" href="../css/form.css" type="text/css">
	<link rel="stylesheet" href="../css/contacts.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300,700&subset=latin,cyrillic,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'/>
</head>
<body>
	<div class="content">
	<ul class="main-menu">
		<li>
			<h1><a href="index.php">Home</a></h1>
		</li>
		<li><a href="articles.php">Статьи</a></li>
		<li><a href="catalog.php">Каталог</a></li>
		<li><a href="gallery.php">Галерея изображений</a></li>
		<li><a href="register.php">Регистрация</a></li>
		<li class="here"><a href="contacts.php">Контакты</a></li>
		Hello,<span style="color: #ff7f50;">
			<?php
				$data = get_user_by_id($_COOKIE['user_id']);
				echo $data['user_login'];
			?>
		</span>
	</ul>
	<section>
		<div class="address">
			<h2>Адрес</h2>
			<p>Мы находимся по адресу: <br/>г. Москва, Варшавское ш., д.1, стр.1</p>
			<p>
				<img src="../img/address.png" alt="г. Москва, Варшавское ш., д.1, стр.1" width="100%"/>
			</p>
		</div>
		<div class="feedback">
			<h2>Обратная связь</h2>
			<form action="command.php",method="POST">
				<p>
					<label for="name">Ваше имя:</label>
					<br/>
					<input type="text" id="name">
				</p>
				<p>
					<label for="phone">Контактный телефон:</label>
					<br/>
					<input type="text" id="phone">
				</p>
				<p>
					<label for="e-mail">Электронная почта:</label>
					<br/>
					<input type="email" id="e-mail">
				</p>
				<p>
					<label for="ask">Задайте свой вопрос:</label>
					<br/>
					<textarea id="ask" placeholder="Опишите свою проблему или задайте вопрос..."></textarea>
				</p>
					<input type="reset" class="btn" value="очистить форму">
					<input type="submit" class="btn" value="отправить">
			</form>
		</div>
	</section>
	</div>
	<footer>
		All rights reserved &copy; 2015
	</footer>
	
</body>
</html>