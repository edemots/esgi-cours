<?php

$t = [];
$nodes = [7, 3, 10, 8, 2, 4, 9, 5, 1, 6];

function insert($tree, $el)
{
    if (count($tree) === 0) {
        return [
          'value' => $el,
          'left' => [],
          'right' => []
        ];
    }
    if ($el <= $tree['value']) {
        $tree['left'] = insert($tree['left'], $el);
        return $tree;
    }
    
    $tree['right'] =  insert($tree['right'], $el);
    return $tree;
}

foreach ($nodes as $node) {
    $t = insert($t, $node);
}
