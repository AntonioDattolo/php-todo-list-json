<?php
if (isset($_POST["name"]) && isset($_POST["state"]) && isset($_POST["deleted"])) {
    $jsonString = file_get_contents("dati.json");
   $todolist = json_decode($jsonString, true);
    $newtodo = [
       "name" => $_POST["name"],
        "state" => $_POST["state"],
        "deleted" => $_POST["deleted"]
    ];
   $todolist["todolist"][] = $newtodo;
    $todolistJson = json_encode($todolist);
    file_put_contents("dati.json", $todolistJson);
    echo $todolistJson;
}else {
    header('Content-Type: application/json');
    // $jsonString = json_encode($todolist);
    $jsonString = file_get_contents("dati.json");
    // header('Access-Control-Allow-Headers: Origin, Content-Type: application/json');
    echo $jsonString;
}