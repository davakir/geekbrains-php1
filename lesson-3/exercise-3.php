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

    $regExp = '/^К.*/';
    foreach ($arr as $item => $region) {
        echo "<p>$item:</p>";
        echo "<ul style=\"list-style-type: none;\">";
        $f = true;

        foreach ($region as $city) {
            echo "<li style=\"display: inline-block;\">";
            if (preg_match_all($regExp, $city))
                echo "\t$city";
            echo "</li>";
        }
        echo "</ul>";
    }

echo "<p style=\"font-weight: 700;\">Задание 6.</p>";

    function rusToEng($string) {
        $alphabet = array(
            "а" => "a",
            "б" => "b",
            "в" => "v",
            "г" => "g",
            "д" => "d",
            "е" => "e",
            "ё" => "yo",
            "ж" => "zh",
            "з" => "z",
            "и" => "i",
            "й" => "y",
            "к" => "k",
            "л" => "l",
            "м" => "m",
            "н" => "n",
            "о" => "o",
            "п" => "p",
            "р" => "r",
            "с" => "s",
            "т" => "t",
            "у" => "u",
            "ф" => "f",
            "х" => "kh",
            "ц" => "ts",
            "ч" => "ch",
            "ш" => "sh",
            "щ" => "tsh",
            "ы" => "y",
            "э" => "e",
            "ю" => "yu",
            "я" => "ya",
            "А" => "A",
            "Б" => "B",
            "В" => "V",
            "Г" => "G",
            "Д" => "D",
            "Е" => "E",
            "Ё" => "YO",
            "Ж" => "ZH",
            "З" => "Z",
            "И" => "I",
            "Й" => "Y",
            "К" => "K",
            "Л" => "L",
            "М" => "M",
            "Н" => "N",
            "О" => "O",
            "П" => "P",
            "Р" => "R",
            "С" => "S",
            "Т" => "T",
            "У" => "U",
            "Ф" => "F",
            "Х" => "KH",
            "Ц" => "TS",
            "Ч" => "CH",
            "Ш" => "SH",
            "Щ" => "TSH",
            "Ы" => "Y",
            "Э" => "E",
            "Ю" => "YU",
            "Я" => "YA",
            "ь" => "",
            "Ь" => ""
        );

        $char = array();
        $results = array();
        preg_match_all('/./u', $string, $results);
        foreach ($results[0] as $char) {
            echo $char . " => ";
            if (array_key_exists($char, $alphabet))
                echo $alphabet[$char] . "<br>";
            else
                echo $char . "<br>";
        }
    }

    rusToEng("Я - Кирьянова Дарья Вадимовна");

echo "<p style=\"font-weight: 700;\">Задание 7.</p>";

    function spaceToLine($string) {
        $temp = explode(' ', $string);
        $string = implode('_', $temp);
        echo "$string";
    }

    spaceToLine("Я - Кирьянова Дарья Вадимовна");

echo "<p style=\"font-weight: 700;\">Задание 8.</p>";


?>
