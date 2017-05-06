<?php

require __DIR__.'/../class/sqldb_connection.php';
require '../model/Author.php';
require '../model/Place.php';
require __DIR__.'/../class/logging.php';


$command = $_GET['command'];
$id = "";

$place = new Place();
$author = new Author();

switch ($command){
    case "place_multiview":
        $response = $place->place_multiview();
        break;
    case "place_singleview":
        $id = $_REQUEST['id'];
        $response = $place->place_singleview($id);
        break;
    case "author_singleview":
        $id = $_REQUEST['id'];
        $response = $author->author_singleview($id);
        break;
    default:
        $response = "Error command";
        break;
}
logging($id,json_encode($response),$command);
echo $response;