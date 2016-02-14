<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 14.02.2016
 * Time: 23:52
 */
if (isset($_GET['firstValue']) && isset($_GET['secondValue']))
{
    $firstValue = $_GET['firstValue'];
    $secondValue = $_GET['secondValue'];
    $result = $firstValue + $secondValue;
}
header('Location: http://localhost:63342/GeekBrainsPHP/lesson-4/exercise-4-upgrade.php?result='.$result.'');
?>