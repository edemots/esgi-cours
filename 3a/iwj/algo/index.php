<?php

require "./functions.php";

function display($array, ...$outline)
{
    $string = "";
    foreach ($array as $key => $value) {
        if ($key > 0) {
            $string .= ', ';
        }
        $string .= count($outline) > 0 && in_array($key, $outline) ? "\e[1;37;45m$value\e[0m" : $value;
    }

    echo $string."\n";
}

function perf($callback, ...$args)
{
    $time = microtime(true);
    $result = $callback(...$args);
    echo round((microtime(true) - $time), 3)."s\n";

    return $result;
}

/**
 * taille: 10 000
 * best of 5
 * temps: 786.101ms
 */
function insertionSort($array)
{
    for ($i = 1; $i < count($array); $i++) {
        $tmp = $array[$i];
        $j = $i;
        // display($array, $j);
        while ($j > 0 && $array[$j - 1] > $tmp) {
            $array[$j] = $array[$j - 1];
            // display($array, $j);
            $j--;
        }
        $array[$j] = $tmp;
        // display($array, $j);
    }

    return $array;
}

/**
 * taille: 10 000
 * best of 5
 * temps: 735.723ms
 */
function selectionSort($array)
{
    for ($i = 0; $i < count($array)-1; $i++) {
        $min = $array[$i];
        $iMin = $i;
        for ($j = $i+1; $j < count($array); $j++) {
            if ($array[$j] < $min) {
                $min = $array[$j];
                $iMin = $j;
            }
        }
        display($array, $iMin);
        $array[$iMin] = $array[$i];
        $array[$i] = $min;
        display($array, $i);
    }

    return $array;
}

$array = array_fill(0, 20, 0);
$array = array_map(function () {
    return rand(1, 100);
}, $array);

// perf('insertionSort', $array);
// display(selectionSort($array));
display(quickSort($array, 0, count($array)-1));
