<?php
header("Content-Type: text/html; charset=utf-8");

$int = 1;
$double = 2.5;
$str = "Oh, my God! I know what PHP is for!";
$bool = false;
define('PI', '3.14');

echo "<p style=\"font-weight: bold;\">Exercise 1</p>";
echo $int . "</br>";
echo $double . "</br>";
echo $str . "</br>";
echo var_dump($bool) . "</br>";
echo PI . "</br>";

echo "<p style=\"font-weight: bold;\">Exercise 2</p>";
echo "$int" . "</br>";
echo "$double" . "</br>";
echo "$str" . "</br>";
echo "$bool" . "</br>";
echo "PI" . "</br>";
echo "In double quotes PHP change inline variables into their values.</br>";

echo "<p style=\"font-weight: bold;\">Exercise 3</p>";
echo '$int' . "</br>";
echo '$double' . "</br>";
echo '$str' . "</br>";
echo '$bool' . "</br>";
echo 'PI' . "</br>";
echo "In single quotes PHP doesn't change inline variables into their values.</br>";

echo "<p style=\"font-weight: bold;\">Exercise 4</p>";
echo "У лукоморья дуб зеленый;</br>";
echo "Златая цепь на дубе том:</br>";
echo "И днем и ночью кот ученый</br>";
echo "Всё ходит по цепи кругом;</br>";
echo "Идет направо - песнь заводит,</br>";
echo "Налево - сказку говорит.</br>";
echo "<span style=\"text-decoration: underline;\">А.С.Пушкин</span>";

echo "<p style=\"font-weight: bold;\">Exercise 5</p>
У лукоморья дуб зеленый;</br>
Златая цепь на дубе том:</br>
И днем и ночью кот ученый</br>
Всё ходит по цепи кругом;</br>
Идет направо - песнь заводит,</br>
Налево - сказку говорит.</br>
<span style=\"text-decoration: underline;\">А.С.Пушкин</span></br>";

echo "<p style=\"font-weight: bold;\">Exercise 6</p>";
echo 10 + "20 приветов" . "</br>";
echo "А все потому, что + это арифметический оператор, который работает только с числами, поэтому из строки он старается сделать число, вычленяет его оттуда, и складывает с 10.";

echo "<p style=\"font-weight: bold;\">Exercise 7</p>";;
echo var_dump($a xor $b) . "</br>";
echo var_dump($a xor !$b) . "</br>";
echo var_dump(!$a xor $b) . "</br>";
echo var_dump(!$a xor !$b) . "</br>";
echo 'For any values $a xor $a = false.' . "</br>";

echo "<p style=\"font-weight: bold;\">Exercise 8</p>";

$x = 10;
$y = 15;

$x = $x/$y;
$y = $x*$y;
$x = $y/$x;

echo "x = $x </br>";
echo "y = $y </br>";

//echo "x = " . (($x | $y) & $y) ."</br>";
//echo "y = " . (($x | $y) & $x) . "</br>";
//echo "Больше никак не смогла придумать...</br>";


?>
