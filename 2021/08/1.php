<?php
class Entry {
    public $input = [];
    public $output = [];

    function __construct(string $line)
    {
        $parts = explode(" ",$line);
        $split_key = array_search('|', $parts);
        $this->output = array_splice($parts, $split_key + 1);
        $this->output[count($this->output)-1] = trim($this->output[count($this->output)-1]);
        $this->input = array_splice($parts, 0, $split_key);
    }
}

$file = new SplFileObject('./input.txt');
$entries = [];
foreach ($file as $index => $line) {
    $entries[$index] = new Entry($line);
}

$count = 0;
foreach($entries as $entry) {
    foreach($entry->output as $out) {
        echo("$out ");
        $len = strlen($out);
        if ($len == 2 || $len == 3 || $len == 4 || $len == 7) {
            $count++;
        }
    }
}
echo("$count");