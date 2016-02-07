<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 06.02.2016
 * Time: 15:08
 */
echo "Timezone is set up: " . (boolean)(date_default_timezone_set("Europe/Moscow"));
header("Content-Type: text/html; charset=utf-8");
echo "<p style=\"font-weight: 700;\">Задание 1.</p>";

    $a = -5;
    $b = 10;

    if ( $a >=0 && $b >= 0 ) //оба числа положительные
        echo $a - $b;
    else if( $a < 0 && $b < 0 ) //оба числа отрицательные
        echo $a * $b;
    else                      //иначе числа с разными знаками
        echo $a + $b;
    echo "</br>";

echo "<p style=\"font-weight: 700;\">Задание 2.</p>";

    switch ( $a = 0 ) {
        case 0: echo 0 . ", ";
        case 1: echo 1 . ", ";
        case 2: echo 2 . ", ";
        case 3: echo 3 . ", ";
        case 4: echo 4 . ", ";
        case 5: echo 5 . ", ";
        case 6: echo 6 . ", ";
        case 7: echo 7 . ", ";
        case 8: echo 8 . ", ";
        case 9: echo 9 . ", ";
        case 10: echo 10 . ", ";
        case 11: echo 11 . ", ";
        case 12: echo 12 . ", ";
        case 13: echo 13 . ", ";
        case 14: echo 14 . ", ";
        case 15: echo 15;
    }
    echo "</br>";

echo "<p style=\"font-weight: 700;\">Задание 3.</p>";

    $a = 9;
    $b = 8;

    function sum($x, $y) {
        return ($x + $y) . "</br>";
    }

    function multiple($x, $y) {
        return ($x * $y) . "</br>";
    }

    function division($x, $y) {
        return ($x / $y) . "</br>";
    }

    function subtraction($x, $y) {
        return ($x - $y) . "</br>";
    }

    echo sum($a, $b);
    echo multiple($a, $b);
    echo division($a, $b);
    echo subtraction($a, $b);

echo "<p style=\"font-weight: 700;\">Задание 4.</p>";

    function mathOperation($arg1, $arg2, $operation) {
        switch ($operation) {
            case "sum" :
                return "Результат сложения: " . sum($arg1, $arg2);
                break;
            case "multiplication" :
                return "Результат умножения: " . multiple($arg1, $arg2);
                break;
            case "division" :
                return "Результат деления: " . division($arg1, $arg2);
                break;
            case "subtraction" :
                return "Результат вычитания: " . subtraction($arg1, $arg2);
                break;
        }
    }

    echo mathOperation(9, 3, "division");

echo "<p style=\"font-weight: 700;\">Задание 5*.</p>";

    function power($val, $pow) {
        if ($pow == 0)
            return 1;
        if ($pow >=1) {
            if ($pow == 1) {
                return $val;
            }
            else {
                return $val * power($val, $pow - 1);
            }
        }
        else if ($pow < 0)
            return 1 / power($val, -$pow);
    }
    echo power(3, -3);

echo "<p style=\"font-weight: 700;\">Задание 6*.</p>";

    function getTime() {
        $hours = date('H');
        $minutes = date('i');

        switch ($hours % 10) {
            case 0: $hours .= " часов "; break;
            case 1: $hours .= " час "; break;
            case 2: case 3: case 4:
            $hours .= " часа "; break;
            case 5: case 6: case 7: case 8: case 9:
            $hours .= " часов "; break;
        }

        switch ($minutes % 10) {
            case 0: $minutes .= " минут "; break;
            case 1: $minutes .= " минута "; break;
            case 2: case 3: case4: $minutes .= " минуты "; break;
            case 5: case 6: case 7: case 8: case 9: $minutes.= " минут ";
        }
        if ($minutes >=11 && $minutes <=14)
            $minutes .= " минут ";

        return $hours . $minutes;
    }

    echo "Сейчас " . getTime() . "</br>";
?>

