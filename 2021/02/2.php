<?php
$file = new SPLFileObject('./input.txt');
$horizontal = 0;
$depth = 0;
$aim = 0;
foreach($file as $line) {
    $parts = explode(" ", $line);
    switch ($parts[0]) {
        case "forward": {
            $x = intval($parts[1]);
            $horizontal += $x;
            $depth += $aim * $x;
            break;
        }
        case "down": {
            $aim += intval($parts[1]);
            break;
        }
        case "up": {
            $aim -= intval($parts[1]);
            break;
        }
    }
}

echo("<p>Depth: $depth</p>");
echo("<p>Horizontal: $horizontal</p>");
echo("<p>Aim: $aim</p>");
echo("<p>Result: ". $depth * $horizontal . "</p>");