<?php

function dfs($tree)
{
    // echo "{$tree['value']}\t";
    if ($tree['left']) {
        dfs($tree['left']);
    }
    if ($tree['right']) {
        dfs($tree['right']);
    }
}

function bfs($tree)
{
    // echo "{$tree['value']}\t";
    $queue = [$tree['left'], $tree['right']];
    while (count($queue) > 0) {
        $item = array_shift($queue);
        // echo "{$item['value']}\t";
        if ($item['left']) {
            array_push($queue, $item['left']);
        }
        if ($item['right']) {
            array_push($queue, $item['right']);
        }
    }
    // echo "\n";
}

function dijkstra($tree)
{
}

$tree = [
    'value' => 'A',
    'left' => [
        'value' => 'B',
        'left' => [
            'value' => 'D',
            'left' => null,
            'right' => null
        ],
        'right' => null,
    ],
    'right' => [
        'value' => 'C',
        'left' => [
            'value' => 'E',
            'left' => null,
            'right' => null
        ],
        'right' => [
            'value' => 'F',
            'left' => null,
            'right' => null
        ],
    ]
];

$time = microtime(true);
dfs($tree);
$duration = round((microtime(true) - $time) * 1000, 3)."ms\n";
echo "\n";
echo $duration;

$time = microtime(true);
bfs($tree);
echo round((microtime(true) - $time) * 1000, 3)."ms\n";
