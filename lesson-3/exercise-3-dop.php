<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .wrapper {
            text-align: center;
            display: inline-block;
        }
        .eb {
            height:150px;
            font-size: 3em;
            vertical-align: top;
            margin-top: 50px;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            float: left;
            margin: 20px;
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

        .north {
            background: url(img/north.jpg) -3px -3px;
        }
        .east {
            background: url(img/east.jpg) 0 -1px;
        }
        .south {
            background: url(img/south.jpg) -2px -1px;
        }
        .west {
            background: url(img/west.jpg) -2px 0;
        }
        td.line {
            background-color: yellow;
        }
    </style>
</head>
<body>
<div class="wrapper eb">
    <h2>Let's Start!</h2>
</div>
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
    array("*","*","*"," ","*","*","*","*"," ","*"),
    array("*"," ","*"," "," "," ","*"," "," ","*"),
    array("*"," ","*"," "," "," ","*","*"," ","*"),
    array("*"," ","*","*","*"," ","*"," "," ","*"),
    array("*"," "," "," ","*"," ","*","*"," ","*"),
    array("*"," ","*"," ","*"," ","*"," "," ","*"),
    array("*"," ","*"," "," "," ","*"," "," "," "),
    array("*","*","*","*","*","*","*","*","*","*")
);

function arrDraw($maze, $direction, $oldDirection) {
    echo "<div class='wrapper'>";
    echo "<table>";
    $strMoveTo = "Я иду ";
    foreach ($maze as $item => $key) {
        echo "<tr>";
        foreach ($key as $symbol)  {
            if ($symbol === " ")
                $class = "empty";
            elseif ($symbol === "*")
                $class = "wall";
            elseif ($symbol === "l")
                $class = "line";
            else
                switch ($direction) {
                    case "north":
                        $class = "man north";
                        $strMoveTo .= "на север";
                        break;
                    case "east":
                        $class = "man east";
                        $strMoveTo .= "на восток";
                        break;
                    case "south":
                        $class = "man south";
                        $strMoveTo .= "на юг";
                        break;
                    case "west":
                        $class = "man west";
                        $strMoveTo .= "на запад";
                }
            echo "<td class='$class'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<p>$strMoveTo</p>";
    echo "</div>";
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
        $oldDir = $dir;
        arrDraw($maze, $dir, $oldDir);
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
        $maze[$manRow][$manCol] = "m";
    } while ($manCol < 10);
    return $maze;
}
steps($maze);
?>
<div class="wrapper eb">
    <h2>The End!</h2>
</div>
</body>
</html>

