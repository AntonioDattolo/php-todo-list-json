<?php
// $todolist = [
//     [
//         'name' => 'fare la spesa',
//         'state' => 'loading'
//     ],
//     [
//         'name' => 'portare fuori il cane',
//         'state' => 'loading'
//     ],
//     [
//         'name' => 'mettere la lavatrice',
//         'state' => 'loading'
//     ],
//     [
//         'name' => 'lavare i piatti',
//         'state' => 'loading'
//     ],
//     [
//         'name' => 'controllare email',
//         'state' => 'doit'
//     ],
// ];

if (isset($_POST["name"]) && isset($_POST["state"])) {
    $jsonString = file_get_contents("dati.json");
    $todolist = json_decode($jsonString, true);
    $newtodo = [
        "name" => $_POST["name"],
        "state" => $_POST["state"]
    ];
    $todolist[] = $newtodo;
    $todolistJson = json_encode($todolist);
    file_put_contents("dati.json", $todolistJson);
    echo $todolistJson;
} else {


    header('Content-Type: application/json');

    // $jsonString = json_encode($todolist);
    $jsonString = file_get_contents("dati.json");
    // header('Access-Control-Allow-Headers: Origin, Content-Type: application/json');

    echo $jsonString;
}