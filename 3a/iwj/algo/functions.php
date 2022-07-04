<?php

/**
 * taille: 10 000
 * best of 5
 * temps: 2920.295ms
 */
function bubbleSort($array)
{
    do {
        $swapped = false;
        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i - 1] > $array[$i]) {
                swap($array[$i], $array[$i - 1]);
                $swapped = true;
            }
        }
    } while ($swapped);

    return $array;
}

/**
 * taille: 10 000
 * best of 5
 * temps: 1705.159ms
 */
function quickSort($array, $lowestIndex, $highestIndex)
{
    if ($lowestIndex < $highestIndex) {
        $pivot = partition($array, $lowestIndex, $highestIndex);
        $array = quickSort($array, $lowestIndex, $pivot - 1);
        $array = quickSort($array, $pivot + 1, $highestIndex);
    }

    return $array;
}

function partition(&$array, $lowestIndex, $highestIndex)
{
    $pivot = $array[$highestIndex];
    $i = $lowestIndex - 1;
    for ($j = $lowestIndex; $j < $highestIndex; $j++) {
        if ($array[$j] < $pivot) {
            display($array, $j, $highestIndex);
            $i++;
            swap($array[$j], $array[$i]);
        }
    }
    swap($array[$i+1], $array[$highestIndex]);
    display($array, $i);
    
    return $i+1;
}

function swap(&$a, &$b)
{
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}
