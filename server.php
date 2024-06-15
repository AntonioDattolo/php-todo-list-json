<?php

if(isset($_POST["indice"])){
    $jsonString = file_get_contents("dati.json");
    $newDeleted = $_POST["indice"];
    $todolist = json_decode($jsonString, true);
   $todolist["todolist"][$newDeleted]["deleted"] = true;
    //funzione per cestinare
    $move = array_slice($todolist["todolist"], $newDeleted,1);
    $move = array_splice($todolist["todolist"], $newDeleted,1);
    $todolist["cestino"][] = $move[0];
    // fine funzione per cestinare
    $todolistJson = json_encode($todolist);
   file_put_contents("dati.json", $todolistJson);
} 
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
}
else {
    header('Content-Type: application/json');
    // $jsonString = json_encode($todolist);
    $jsonString = file_get_contents("dati.json");
    // header('Access-Control-Allow-Headers: Origin, Content-Type: application/json');
    echo $jsonString;
}