<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10.02.16
 * Time: 18:21
 */
header("Content-Type: text/html; charset=utf-8");

echo "<p style=\"font-weight: 700;\">Задание 1.</p>";

    $a = 0;
    while ($a < 101) {
        if (!($a % 3))
            echo "$a, ";
        ++$a;
    }

echo "<p style=\"font-weight: 700;\">Задание 2.</p>";

    $a = 0;
    do {
        if ($a == 0)
            echo "$a - это ноль";
        else if (!($a%2))
                echo "$a - это четное число";
            else echo "$a - это нечетное число";
        echo "</br>";
        ++$a;
    } while ($a < 11);

echo "<p style=\"font-weight: 700;\">Задание 3.</p>";

    for ($a = 0; $a < 10 && printf("%d ", $a); ++$a) {}

echo "<p style=\"font-weight: 700;\">Задание 4.</p>";

$arr  = array(
    "Московская область" => array("Клин", "Лобня", "Химки"),
    "Ленинградская область" => array("Пушкино", "Петергоф", "Кронштадт"),
    "Калужская область" => array("Обнинск", "Медынь", "Козельск")
);
echo "<pre>";
foreach ($arr as $item => $region) {
    echo "<p>$item:</p>";
    $f = true;
    foreach ($region as $city) {
        if (!$f)
            echo ", $city";
        else echo "\t$city";
        $f = false;
    }
}
echo "</pre>";

foreach ($arr as $item => $region) {
    echo "<p>$item:</p>";
    echo "<ul style=\"list-style-type: none;\">";
    $f = true;
    
    foreach ($region as $city) {
		echo "<li style=\"display: inline-block;\">";
        if (!$f)
            echo ", $city";
        else echo "\t$city";
        echo "</li>";
        $f = false;
    }
    echo "</ul>";
}

echo "<p style=\"font-weight: 700;\">Задание 5.</p>";

foreach ($arr as $item => $region) {
	echo "<p>$item:</p>";
    echo "<ul style=\"list-style-type: none;\">";
    $f = true;
	
	foreach ($region as $city) {
		echo "<li style=\"display: inline-block;\">";
		if (preg_match('/[К]{1}.*/', $city))
			echo "\t$city";
		echo "</li>";
	}
	echo "</ul>";
}

echo "<p style=\"font-weight: 700;\">Задание 6.</p>";

?>
