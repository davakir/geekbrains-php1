<?php
require_once("functions/file_handling.php");
require_once("functions/img_resize.php");
// var_dump($_SERVER);
if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
		$err = is_valid_file($file);
		if (!$err) {
		    $img_name = insert_into_db($file);
			change_location($file['tmp_name'], $img_name);
			
			img_resize("uploads/" . $img_name, "img_preview/" . $img_name, 200, 200);
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Галерея</title>
	<meta charset="utf-8"/>
	<meta name="description" content="This is the main page of my site"/>
	<link rel="stylesheet" href="../lesson-5/css/style.css" type="text/css">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300,700&subset=latin,cyrillic,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'/>
</head>
<body>
<div class="content">
	<ul class="main-menu">
		<li>
			<h1><a href="#">Home</a></h1>
		</li>
		<li><a href="#">Статьи</a></li>
		<li><a href="#">Каталог</a></li>
		<li class="here"><a href="#">Галерея изображений</a></li>
		<li><a href="#">Регистрация</a></li>
		<li><a href="#">Контакты</a></li>
	</ul>
	<section>
		<form action="" enctype="multipart/form-data" method="POST">
			<input type="file" name="file"/>
			<input type="submit" name="submit" value="Отправить" class="btn">
			<p>Выберите изображение размером не более 5 МБ</p>
			<?php
			if ($err)
				echo "<p class='error'>$err</p>";
			?>
		</form>
		<div class="gallery">
			<?php
			$images = scandir("uploads/");
			for ($i = 2; $i < count($images); $i++) {
				echo "<p class='image'>";
				echo "<a href='uploads/$images[$i]' target='photo.php'>";
				echo "<img src='img_preview/$images[$i]' alt='Фото' width='200px'>";
				echo "</a>";
				echo "</p>";
			}
			?>
		</div>
	</section>
</div>
<footer>
	All rights reserved &copy; 2015
</footer>

</body>
</html>