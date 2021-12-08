<?php
class Entry
{
    public $input = [];
    public $output = [];

    function __construct(string $line)
    {
        $parts = explode(" ", $line);
        $split_key = array_search('|', $parts);
        $this->output = array_splice($parts, $split_key + 1);
        $this->output[count($this->output) - 1] = trim($this->output[count($this->output) - 1]);
        $this->input = array_splice($parts, 0, $split_key);
    }
}

$file = new SplFileObject('./input.txt');
$entries = [];
foreach ($file as $index => $line) {
    $entries[$index] = new Entry($line);
}

$mappings = array();
$sum = 0;
foreach ($entries as $entry) {
    foreach ($entry->input as $in) {
        $len = strlen($in);
        switch ($len) {
                // Nummer 1
            case 2: {
                    $mappings[1] = $in;
                    break;
                }
                // Nummer 7
            case 3: {
                    $mappings[7] = $in;
                    break;
                }
                // Nummer 4
            case 4: {
                    $mappings[4] = $in;
                    break;
                }
                // Nummer 8
            case 7: {
                    $mappings[8] = $in;
                    break;
                }
        }
    }
    foreach ($entry->input as $in) {
        $len = strlen($in);
        if ($len != 2 && $len != 3 && $len != 4 && $len != 7) {
            // 6 => 0, 6 oder 9
            if ($len == 6) {
                if (!is_part_sum(str_split($in), str_split($mappings[1]))) {
                    $mappings[6] = $in;
                } elseif (!is_part_sum(str_split($in), str_split($mappings[4]))) {
                    $mappings[0] = $in;
                } else {
                    $mappings[9] = $in;
                }
            }

            // 5 => 2, 3 oder 5
            if ($len == 5) {
                if (is_part_sum(str_split($in), str_split($mappings[1]))) {
                    $mappings[3] = $in;
                }
            }
        }
    }
    foreach ($entry->input as $in) {
        $len = strlen($in);
        if ($len == 5 && $in != $mappings[3]) {
            if (is_part_sum(str_split($mappings[6]), str_split($in))) {
                $mappings[5] = $in;
            } else {
                $mappings[2] = $in;
            }
        }
    }

    $digits = "";
    foreach ($entry->output as $out) {
        foreach($mappings as $number => $mapping) {
            if (is_part_sum(str_split($mapping), str_split($out)) && strlen($mapping) == strlen($out)) {
                $digits .= $number;
            }
        }
    }
    $sum += intval($digits);
    echo("$digits\n");
}
echo("$sum\n");
print_r($mappings);

function is_part_sum($is, $of): bool {
    foreach($of as $o) {
        $is_part = false;
        foreach($is as $i) {
            if ($i == $o) {
                $is_part = true;
            }
        }
        if (!$is_part) {
            return false;
        }
    }
    return true;
}