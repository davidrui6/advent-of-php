<?php
$file = new SplFileObject('./input.txt');
$input = [];
foreach ($file as $line) {
    $input = explode(',', $line);
}
sort($input);

$fuelSums = array();
for ($a = 0; $a <= $input[count($input) - 1]; $a++) {
    $sum = 0;
    foreach ($input as $in) {
        // Betragswert um Abstand zu bestimmen
        $sum += abs($in - $a);
    }
    $fuelSums[$a] = $sum;
}

$position = array_keys($fuelSums, min($fuelSums))[0];
echo ("$position \n");
echo ("$fuelSums[$position]\n");