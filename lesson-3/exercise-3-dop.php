<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -150px;
            margin-left: -150px;
        }

        td {
            width: 30px;
            height: 30px;
        }

        td.wall {
            background-color: #000;
        }

        td.empty {
            background-color: #fff;
        }

        td.man {
            background-color: #f0f;
        }
        td.line {
            background-color: yellow;
        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 13.02.2016
 * Time: 23:32
 */

$maze = array(
    array("*","*","*","*","*","*","*","*","*","*"),
    array("m"," "," "," "," "," "," "," "," ","*"),
    array("*","*","*"," ","*","*"," ","*"," ","*"),
    array("*"," ","*"," "," "," ","*"," "," ","*"),
    array("*"," ","*"," "," "," ","*","*"," ","*"),
    array("*"," "," ","*","*"," ","*"," "," ","*"),
    array("*"," "," "," ","*"," ","*","*"," ","*"),
    array("*"," ","*"," ","*"," ","*"," "," ","*"),
    array("*"," ","*"," "," "," ","*"," "," "," "),
    array("*","*","*","*","*","*","*","*","*","*")
);

function arrDraw($maze) {
    echo "<p><table>";
    foreach ($maze as $item => $key) {
        echo "<tr>";
        foreach ($key as $symbol)  {
            if ($symbol === " ")
                $class = "empty";
            elseif ($symbol === "*")
                $class = "wall";
            elseif ($symbol === "l")
                $class = "line";
            else $class = "man";

            echo "<td class='$class'></td>";
        }
        echo "</tr>";
    }
    echo "</table></p>";
}

function steps($maze) {
    for ($i = 0; $i < count($maze); $i++)
        for ($j = 0; $j < count($maze[$i]); $j++) {
            if ($maze[$i][$j] == "m") {
                $manRow = $i;
                $manCol = $j;
            }
        }

    $dir = "east";
    do {
        $maze[$manRow][$manCol] = "l";
        switch ($dir) {
            case "east":
                if ($maze[$manRow+1][$manCol] != "*") {
                    $manRow++;
                    $dir = "south";
                }
                elseif ($maze[$manRow][$manCol+1] != "*") {
                    $manCol++;
                }
                elseif ($maze[$manRow-1][$manCol] != "*") {
                    $manRow--;
                    $dir = "north";
                }
                else {
                    $manCol--;
                    $dir = "west";
                }
                break;
            case "west" :
                if ($maze[$manRow-1][$manCol] != "*") {
                    $manRow--;
                    $dir = "north";
                }
                elseif ($maze[$manRow][$manCol-1] != "*") {
                    $manCol--;
                }
                elseif ($maze[$manRow+1][$manCol] != "*") {
                    $manRow++;
                    $dir = "south";
                }
                else {
                    $manCol++;
                    $dir = "east";
                }
                break;
            case "north" :
                if ($maze[$manRow][$manCol+1] != "*") {
                    $manCol++;
                    $dir = "east";
                }
                elseif ($maze[$manRow-1][$manCol] != "*") {
                    $manRow--;
                }
                elseif ($maze[$manRow][$manCol-1] != "*") {
                    $manCol--;
                    $dir = "west";
                }
                else {
                    $manRow++;
                    $dir = "south";
                }
                break;
            case "south" :
                if ($maze[$manRow][$manCol-1] != "*") {
                    $manCol--;
                    $dir = "west";
                }
                elseif ($maze[$manRow+1][$manCol] != "*") {
                    $manRow++;
                }
                elseif ($maze[$manRow][$manCol+1] != "*") {
                    $manCol++;
                    $dir = "east";
                }
                else {
                    $manRow--;
                    $dir = "north";
                }
        }
    } while ($manCol < 10);
    $maze[$manRow][$manCol-1] = "m";
    return $maze;
}
arrDraw(steps($maze));
?>

</body>
</html>

