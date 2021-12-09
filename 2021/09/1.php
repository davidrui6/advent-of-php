<?php
$file = new SplFileObject('./input.txt');
$smoke_map = [[]];
function x($var) {return trim($var) != "";}
foreach ($file as $index => $line) {
    $smoke_map[$index] = str_split($line);
    $smoke_map[$index] = array_filter($smoke_map[$index], "x");
}
print_r($smoke_map);
$sum = 0;
for ($row = 0; $row < count($smoke_map); $row++) {
    for ($col = 0; $col < count($smoke_map[$row]); $col++) {
        $last_row = $row == count($smoke_map) - 1;
        $first_row = $row == 0;
        $last_col = $col == count($smoke_map[$row]) - 1;
        $first_col = $col == 0;

        if (($last_row || $smoke_map[$row][$col] < $smoke_map[$row + 1][$col]) &&
            ($first_row || $smoke_map[$row][$col] < $smoke_map[$row - 1][$col]) &&
            ($last_col || $smoke_map[$row][$col] < $smoke_map[$row][$col + 1]) &&
            ($first_col || $smoke_map[$row][$col] < $smoke_map[$row][$col - 1])) {
            $sum += intval($smoke_map[$row][$col]) + 1;
        }
    }
}
echo ($sum);
