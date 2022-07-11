<?php

function printTree($tree)
{
    $queue = [$tree];
    $temp = [];
    $counter = 0;
    $height = treeHeight($tree)-1;
    $numberOfElements = (($height + 1)**2) - 1;

    while ($counter <= $height) {
        $removed = array_shift($queue);
        if (count($temp) === 0) {
            printSpace($numberOfElements / (($counter+1)**2), $removed);
        } else {
            printSpace($numberOfElements / ($counter**2), $removed);
        }

        if (!$removed || count($removed['left']) === 0) {
            $temp[] = null;
        } else {
            $temp[] = $removed['left'];
        }
        if (!$removed || count($removed['right']) === 0) {
            $temp[] = null;
        } else {
            $temp[] = $removed['right'];
        }
 
        if (count($queue) === 0) {
            echo "\n\n";
            $queue = $temp;
            $temp = [];
            $counter++;
        }
    }
}

function treeHeight($tree)
{
    if (count($tree) === 0) {
        return 0;
    }

    $lHeight = treeHeight($tree['left']);
    $rHeight = treeHeight($tree['right']);

    return $lHeight > $rHeight ? $lHeight+1 : $rHeight+1;
}

function printSpace($n, $removed)
{
    for (; $n > 0; $n--) {
        echo "    ";
    }
    if ($removed === null) {
        echo " ";
    } else {
        echo $removed['value'];
    }
}
