<?php
    require_once("functions/mysql_db_service.php");
    session_start();
    $err = array();
    if (isset($_POST['submit'])) {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if (!get_user($_POST['login'])) {
                $add_result = add_user($_POST['login'], $_POST['password']);
                if ($add_result == false) {
                    $err[] = "При добавлении пользователя произошла ошибка, попробуйте еще раз";
                }
                else {
                    $id = get_user_id($_POST['login']);
                    $_SESSION['user_id'] = $id;
                    header('Location: login.php');
                    exit();
                }
            }
            else {
                $err[] = "Пользователь с таким логином уже существует";
            }             
        }
        else $err[] = "Не введены логин/пароль";
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<meta charset="utf-8"/>
	<meta name="description" content="This is the main page of my site"/>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" href="../css/form.css" type="text/css">
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
			<li class="here"><a href="register.php">Регистрация</a></li>
			<li><a href="contacts.php">Контакты</a></li>
		</ul>
		<section>
		    <form action="" method="POST">
			<table class="register-form">
			<caption><h1>Форма регистрации</h1></caption>
					<tr>
					    <td colspan="2" class="error-info">
                            <?php
                                if ($err) {
                                    foreach ($err as $item) {
                                        echo "<p class='error'>$item</p>";
                                    }
                                }
                            ?>
					    </td>
					</tr>

				
					<tr>
						<td class="labels"><label for="lastname">Фамилия:</label></td>
						<td><input type="text" id="lastname" name="lastname" placeholder="Фамилия"></td>
					</tr>
					<tr>
						<td class="labels"><label for="name">Имя:</label></td>
						<td><input type="text" id="name" name="name" placeholder="Имя"></td>
					</tr>

					<tr>
						<td class="labels"><label for="login">Логин:</label></td>
						<td><input type="text" id="login" name="login" placeholder="Логин"></td>
					</tr>
					<tr>
						<td class="labels"><label for="email">E-mail:</label></td>
						<td><input type="email" id="email" name="email" placeholder="example@mail.com"></td>
					</tr>
					<tr>
						<td class="labels"><label for="pass">Введите пароль:</label></td>
						<td><input type="password" id="pass" name="password"></td>
					</tr>
					<tr>
						<td class="labels">Пол:</td>
						<td>
						    <input type="radio" name="sex" value="male" id="male-sex" checked="checked"><label for="male-sex">Мужской</label>
							<input type="radio" name="sex" value="female" id="female-sex"><label for="female-sex">Женский</label>
						</td>
					</tr>
					<tr>
						<td class="labels">
							<label for="interest">Что Вас больше всего интересует?</label>
						</td>
						<td>
							<select name="interest" id="interest">
								<option value="history">История</option>
								<option value="culture">Культура</option>
								<option value="economics">Экономика</option>
								<option value="travel">Путешествия</option>
								<option value="fashion">Мода</option>
								<option value="it">IT-технологии</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="labels">
							<label for="about">Расскажите немного о себе:</label>
						</td>
						<td>
							<textarea id="about" placeholder="Расскажите о себе..."></textarea>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="reset" class="btn" value="очистить форму">
							<input type="submit" class="btn" name="submit" value="зарегистрироваться">					
						</td>
					</tr>
			    </table>
			</form>
		</section>
		</div>
		<footer>
			All rights reserved &copy; 2015
		</footer>
</body>
</html>