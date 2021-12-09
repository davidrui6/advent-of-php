<?php
$file = new SplFileObject('./input.txt');
$occ = array(0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0);
foreach ($file as $line) {
    $input = explode(",", $line);
    foreach ($input as $in) {
        $val = intval($in);
        $occ[$val] += 1;
    }
}

for ($i = 0; $i < 256; $i++) {
    foreach ($occ as $day => &$amount) {
        if ($day == 0 && $amount > 0) {
            $occ[7] += $amount;
            $occ[9] += $amount;
            $occ[0] -= $amount;
        } elseif ($amount > 0) {
            $occ[$day - 1] += $amount;
            $occ[$day] -= $amount;
        }
    }
    print_r($occ);
}
echo(array_sum($occ));