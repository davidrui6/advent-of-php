<?php
$file = new SPLFileObject('./input.txt');
$values = [];
foreach($file as $index => $line) {
    $values[$index] = $line;
}

$increased = 0;
$t = 0;
for ($i = 0; $i < count($values) - 2; $i++) {
    $sum = 0;
    for($j = 0; $j < 3; $j++) {
        $sum += intval($values[$i + $j]);
    }
    if ($sum > $t && $i > 0) {
        $increased++;
    }
    $t = $sum;
}
echo("$increased");
