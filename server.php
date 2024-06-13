<?php
$todolist = [
    [
        'name' => 'fare la spesa',
        'state' => 'loading'
    ],
    [
        'name' => 'portare fuori il cane',
        'state' => 'loading'
    ],
    [
        'name' => 'mettere la lavatrice',
        'state' => 'loading'
    ],
    [
        'name' => 'lavare i piatti',
        'state' => 'loading'
    ],
    [
        'name' => 'controllare email',
        'state' => 'doit'
    ],
];

header('Access-Control-Allow-Headers: Origin, Content-Type: application/json');

$jsonString = json_encode($todolist);

echo $jsonString;