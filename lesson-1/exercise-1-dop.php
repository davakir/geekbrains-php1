<?php

date_default_timezone_set('UTC');
header("Content-Type: text/html; charset=utf-8");

	$myName = 'Darya';
	$myAge = 23;
	$time = date('d-m-Y H:i');

echo "<p style=\"font-weight: bold;\">Задание 1</p>";
echo "Меня зовут $myName. </br>
Через год мне будет " . ($myAge+1) . " лет, а еще через год " . ($myAge+2) . " лет. </br>
На моих часах сейчас: $time. </br>";

echo "<p style=\"font-weight: bold;\">Задание 2</p>";
echo str_replace(" ", "_", "Меня зовут $myName. </br>
Через год мне будет " . ($myAge+1) . " лет, а еще через год " . ($myAge+2) . " лет. </br>
На моих часах сейчас: $time. </br>");

echo "<p style=\"font-weight: bold;\">Задание 3</p>";
echo mb_substr("Меня зовут $myName. </br>
Через год мне будет " . ($myAge+1) . " лет, а еще через год " . ($myAge+2) . " лет. </br>
На моих часах сейчас: $time. </br>", 125);


//Меня зовут Darya.
//Через год мне будет 24 лет, а еще через год 25 лет.
//На моих часах сейчас: 05-02-2016 13:58. 
?>


