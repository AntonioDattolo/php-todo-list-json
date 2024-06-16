<?php
if(isset($_POST["softDelete"])){
    $jsonString = file_get_contents("dati.json");
    $newDeleted = $_POST["softDelete"];
    $todolist = json_decode($jsonString, true);
    $todolist["todolist"][$newDeleted]["deleted"] = true;
    $move = array_slice($todolist["todolist"], $newDeleted,1);
    $move = array_splice($todolist["todolist"], $newDeleted,1);
    $todolist["cestino"][] = $move[0];
    $todolistJson = json_encode($todolist);
    file_put_contents("dati.json", $todolistJson);
}
elseif(isset($_POST["restoration"])){
    $jsonString = file_get_contents("dati.json");
    $restorationElement = $_POST["restoration"];
    $todolist = json_decode($jsonString, true);
    $todolist["cestino"][$restorationElement]["deleted"] = false;
    $move = array_slice($todolist["cestino"], $restorationElement,1);
    $move = array_splice($todolist["cestino"], $restorationElement,1);
    $todolist["todolist"][] = $move[0];
    $todolistJson = json_encode($todolist);
    file_put_contents("dati.json", $todolistJson);
}
elseif(isset($_POST["hardDelete"])){
    $jsonString = file_get_contents("dati.json");
    $restorationElement = $_POST["hardDelete"];
    $todolist = json_decode($jsonString, true);
    $move = array_splice($todolist["cestino"], $restorationElement,1);
    $todolistJson = json_encode($todolist);
    file_put_contents("dati.json", $todolistJson);
} 