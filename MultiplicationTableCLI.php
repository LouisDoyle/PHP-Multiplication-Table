<?php
declare(strict_types = 1);

include_once('MultiplicationTable.php');

use MultiplicationTable\MultiplicationTable;

$rows = 10;
$columns = 10;

if (isset($argv)) {
    for ($i = 0; $i < count($argv); $i++) {
        if ($argv[$i] == "-rows" || $argv[$i] == "-columns") {
            if (isset($argv[$i + 1])) {
                $newNumber = (int)$argv[$i + 1];

                if ($newNumber > 0) {
                    if ($argv[$i] == "-rows") {
                        $rows = $newNumber;
                    } elseif ($argv[$i] == "-columns") {
                        $columns = $newNumber;
                    }
                }
            }
        }
    }

    $multiplicationTable = new MultiplicationTable($rows, $columns);

    echo $multiplicationTable->cli();
}