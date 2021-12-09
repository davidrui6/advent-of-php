<?php
$file = new SPLFileObject('./input.txt');
$input = [];
foreach($file as $line) {
    $input = explode(",", $line);
}

for($day = 0; $day < 4; $day++) {
    $to_zero = 0;
    for ($i = 0; $i < count($input); $i++) {
        if (intval($input[$i]) > 0) {
            $input[$i] = intval($input[$i]) - 1;
        } else {
            $input[$i] = 6;
            $to_zero++;
        }
    }
    for($z = 0; $z < $to_zero; $z++) {
        $input[count($input)] = 8;
    }
    echo("Day $day :".count($input));
}
