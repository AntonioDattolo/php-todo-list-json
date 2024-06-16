<?php
if(isset($_POST["stateToChange"]) && isset($_POST["indexToChange"])){
    $jsonString = file_get_contents("dati.json");
    $todolist = json_decode($jsonString, true);
    $todolist["todolist"][$_POST["indexToChange"]]["state"] = filter_var($_POST["stateToChange"], FILTER_VALIDATE_BOOLEAN);
    $todolistJson = json_encode($todolist);
    file_put_contents("dati.json", $todolistJson);
}