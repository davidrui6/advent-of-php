<?php
$file = new SPLFileObject('./input.txt');
$values = [];
foreach($file as $index => $line) {
    $values[$index] = $line;
}

$increased = 0;
for ($i = 1; $i < count($values); $i++) {
    if (intval($values[$i]) > intval($values[$i - 1])) {
        $increased++;
    }
}
echo("$increased");