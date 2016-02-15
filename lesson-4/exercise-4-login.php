<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 14.02.2016
 * Time: 23:52
 */
$salt = "bullshit";
$users = array(
	"darya" => md5($salt."123456".$salt),
	"maxim" => md5($salt."password".$salt),
	"admin" => md5($salt."bla1234".$salt)
);
if (isset($_POST['login']) && isset($_POST['password'])) {
	if (array_key_exists($_POST['login'], $users)) {
		if (md5($salt.$_POST['password'].$salt) == $users[$_POST['login']])
			$login_ok = "Приветствую тебя!";
		else $error = "Пароль неверен, попробуйте еще раз";
	}
	else $error = "Пользователя с таким логином не существует";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<form method="POST">
	<?php
		if ($login_ok) {
			echo "<div id=\"ok\">$login_ok</div>";
		}
		else {
	?>
    <div class="center">
		<input type="text" name="login"
		<?php
			if (isset($_POST['login'])) {
				if ($error) 
					echo "value=\"".$_POST['login']."\"";
			}
		?>
		/>
		<input type="password" name="password"
		<?php
			if (isset($_POST['password'])) {
				if ($error) 
					echo "value=\"".$_POST['password']."\"";
			}
		?>
		/>
		<input type="submit" value="Sign in">
		<br/>
		<?php
			if ($error) echo $error;
			else echo $login_ok;
		?>
    </div>
    <?php }  ?>
</form>
</body>
</html>
