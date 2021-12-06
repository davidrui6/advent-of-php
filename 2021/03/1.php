<?php
function getCommonBits($lines) {
    $occ = [];
    foreach($lines as $line) {
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
        if ($bit >= 0) {
            $most = $most."1";
            $least = $least."0";
        } else {
            $most = $most."0";
            $least = $least."1";
        }
    }
    return [$most, $least];
}
$lines = new SPLFileObject('./input.txt');
$res = getCommonBits($lines);

$most = substr($res[0], 0, -1);
$least = substr($res[1], 0, -1);

echo("<p>$most =>". bindec($most). "</p>");
echo("<p>$least => ". bindec($least)."</p>");
echo("<p>Result => ". bindec($most) * bindec($least) ."</p>");