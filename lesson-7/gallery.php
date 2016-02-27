<?php
require_once("functions/file_handling.php");
require_once("functions/img_resize.php");
require_once("functions/mysql_db_service.php");
require_once("functions/reviews.php");

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
		$err = is_valid_file($file);
		if (!$err) {
		    $img_name = insert_into_db($file);
			change_location($file['tmp_name'], $img_name);
			img_resize("uploads/" . $img_name, "img_preview/" . $img_name, 200, 200);
		}
}

function select_images() {
    $conn = connect();
    $arr = array();
    $query = mysql_query("SELECT name, time_seen FROM images ORDER BY time_seen DESC", $conn);
    while ($row = mysql_fetch_assoc($query)) {
        $arr[] = $row;
    }
    return $arr;
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
			$all_images = select_images();
			for ($i = 0; $i < count($all_images); $i++) {
			    $path_to_img = "uploads/" . $all_images[$i]['name'];
			    $path_to_mini_img = "img_preview/" . $all_images[$i]['name'];
				echo "<p class='image'>";
				echo "<a href=\"photo.php?img_name=$path_to_img\" target='_blank'>";
				echo "<img src=\"$path_to_mini_img\" alt='Фото' width='200px'>";
				echo "</a><br />";
				echo "<span>" . getVarCaption($all_images[$i]['time_seen'], "просмотр", "просмотра", "просмотров") . "</span>";
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