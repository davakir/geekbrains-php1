<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 14.02.2016
 * Time: 23:35
 */
header('Content-type:text/html;charset=utf-8');
$result = "";
	
	if (!isset($_POST['reset']) && isset($_POST['firstValue']) && isset($_POST['secondValue']))
	{
		if ($_POST['firstValue'] == "" || $_POST['secondValue'] == "")
			echo "<p id=\"error\">Не введен какой-либо из параметров. Попробуйте еще раз</p>";
		$firstValue = $_POST['firstValue'];
		$secondValue = $_POST['secondValue'];
		switch ($_POST['operation']) {
			case "+":
				$result = $firstValue + $secondValue;
				break;
			case "-":
				$result = $firstValue - $secondValue;
				break;
			case "*":
				$result = $firstValue * $secondValue;
				break;
			case "/":
				if ($secondValue == 0)
					echo "<p id=\"error\">На ноль делить нельзя. Ввведите корректный делитель.</p>";
				$result = $firstValue / $secondValue;

		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<form method="POST">
    <div class="center">
        <input type="text" name="firstValue"
            <?php 
            if (isset($_POST['firstValue']))
                echo "value='$firstValue'";
            if (isset($_POST['reset']))
				echo "value=\"\"";
            ?>
        />
        <input type="text" name="secondValue"
            <?php 
            if (isset($_POST['secondValue']))
                echo "value='$secondValue'";
            if (isset($_POST['reset']))
				echo "value=\"\"";
            ?>
        />
        <span>&nbsp;=&nbsp;</span>
        <input type="text" id="result" name="result" disabled
        <?php
        if ($result != "") 
			echo "value='$result'"; 
		if (isset($_POST['reset']))
			echo "value=\"\"";
        ?>/>
        
    </div>
    <div class="center">
        <input type="submit" value="+" name="operation"/>
        <input type="submit" value="-" name="operation"/>
        <input type="submit" value="*" name="operation"/>
        <input type="submit" value="/" name="operation"/>
        <br/>
        <input type="submit" name="reset" value="Очистить форму"/>
    </div>
</form>
<form name="clear" method="post">
	<input hidden name="reset" value="true"/>
	
</form>
</body>
</html>
