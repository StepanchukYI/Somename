<?php

require_once '../class/sqldb_connection.php';
require_once '../model/Author.php';
require_once '../model/Place.php';
require_once '../class/logging.php';


$command = $_REQUEST['command'];
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