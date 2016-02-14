<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 14.02.2016
 * Time: 23:35
 */
header('Content-type:text/html;charset=utf-8');

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
    <div class="center">
        <input type="text" name="firstValue"
            <?php if (isset($_GET['firstValue']))
                echo "value='$firstValue'";
            ?>
        />
        <input type="text" name="secondValue"
            <?php if (isset($_GET['secondValue']))
                echo "value='$secondValue'";
            ?>
        />
        <span>&nbsp;=&nbsp;</span>
        <input type="text" id="result" name="result" value="<?php echo $result; ?>">
    </div>
    <div class="center">
        <input type="submit" formaction="plus.php" value="+"/>
        <input type="submit" value="-"/>
        <input type="submit" value="*"/>
        <input type="submit" value="/"/>

    </div>


</form>
</body>
</html>