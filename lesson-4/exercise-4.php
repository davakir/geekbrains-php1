<?php
header('Content-type:text/html;charset=utf-8');
    if (isset($_POST['firstValue']) && isset($_POST['secondValue']))
    {
        $firstValue = $_POST['firstValue'];
        $secondValue = $_POST['secondValue'];
        $operation = $_POST['operation'];
        switch ($operation) {
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
                if (!$secondValue) {
                    $result = "";
                    echo "<p>На ноль делить нельзя. Введите корректный делитель.</p>";
                }
                else $result = $firstValue / $secondValue;

        }
    }
    $arrOperations = array("+","-","*","/");
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
        <input type="text" name="firstValue"
        <?php if (isset($_POST['firstValue']))
            echo "value='$firstValue'";
        ?>
        />
        <select name="operation" id="symbol">
			<?php
				foreach ($arrOperations as $item) {
					echo "<option value=\"$item\"";
					if ($_POST['operation'] == $item)
						echo "selected=\"selected\"";
					echo ">$item</option>";
				}
			?>
        </select>
        <input type="text" name="secondValue"
            <?php if (isset($_POST['secondValue']))
                echo "value='$secondValue'";
            ?>
        />
        <input type="submit" value="="/>
        <input type="text" id="result" name="result" value="<?php echo $result; ?>">
    </form>
</body>
</html>
