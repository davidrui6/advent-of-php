<?php
$file = new SPLFileObject('./input.txt');
$horizontal = 0;
$depth = 0;
foreach($file as $line) {
    $parts = explode(" ", $line);
    switch ($parts[0]) {
        case "forward": {
            $horizontal += intval($parts[1]);
            break;
        }
        case "down": {
            $depth += intval($parts[1]);
            break;
        }
        case "up": {
            $depth -= intval($parts[1]);
            break;
        }
    }
}

echo("<p>Depth: $depth</p>");
echo("<p>Horizontal: $horizontal</p>");
echo("<p>Result: ". $depth * $horizontal . "</p>");