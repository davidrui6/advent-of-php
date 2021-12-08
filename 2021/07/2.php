<?php
$file = new SPLFileObject('./input.txt');
$input = [];
foreach ($file as $line) {
    $input = explode(',', $line);
}
sort($input);

for ($a = 0; $a <= $input[count($input) - 1]; $a++) {
    $sum = 0;
    foreach ($input as $in) {
        $h = abs($in - $a);
        // n-te Teilsumme einer arithmetischen Folge: 1+2+...+n
        $sum += $h * ((1 + $h) / 2);
    }
    $fuelSums[$a] = $sum;
}

$position = array_keys($fuelSums, min($fuelSums))[0];
echo ("$position \n");
echo ("$fuelSums[$position]\n");