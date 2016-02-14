<?php
header('Content-type:text/html;charset=utf-8');
    if (isset($_GET['firstValue']) && isset($_GET['secondValue']))
    {
        $firstValue = $_GET['firstValue'];
        $secondValue = $_GET['secondValue'];
        $operation = $_GET['operation'];
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <form method="GET">
        <input type="text" name="firstValue"
        <?php if (isset($_GET['firstValue']))
            echo "value='$firstValue'";
        ?>
        />
        <select name="operation" id="symbol">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="secondValue"
            <?php if (isset($_GET['secondValue']))
                echo "value='$secondValue'";
            ?>
        />
        <input type="submit" value="="/>
        <input type="text" id="result" name="result" value="<?php echo $result; ?>">
    </form>
</body>
</html>
