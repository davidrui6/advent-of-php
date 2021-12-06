<?php
$file = new SPLFileObject('./input.txt');
$occ = [];
foreach($file as $line) {
    $bits = str_split($line);
    foreach($bits as $index => $bit) {
        if ($bit === "1") {
            $occ[$index] += 1;
        } else {
            $occ[$index] -= 1;
        }
    }
}

$most = "";
$least = "";
foreach($occ as $bit) {
    echo("$bit");
    if ($bit >= 0) {
        $most = $most."1";
        $least = $least."0";
    } else {
        $most = $most."0";
        $least = $least."1";
    }
    echo("<br>");
}

$most = substr($most, 0, -1);
$least = substr($least, 0, -1);

echo("<p>$most =>". bindec($most). "</p>");
echo("<p>$least => ". bindec($least)."</p>");
echo("<p>Result => ". bindec($most) * bindec($least) ."</p>");